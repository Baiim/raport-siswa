<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $guru = Guru::query();
            return Datatables::of($guru)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('guru.edit', $row->id); // Ganti dengan URL edit yang sesuai
                    $deleteUrl = route('guru.destroy', $row->id);
                    
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf" data-url="' . $editUrl . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<form class="form-delete" action="' . $deleteUrl . '" method="POST" style="display:inline">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger btn-user btn-block btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </form>';
                    $btn .= '</div>';
    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.master.guru.index');
    }
    
    public function create(){
        return view('pages.admin.master.guru.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Buat user terlebih dahulu
        $user = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'level' => 1, // Set level ke 1
        ]);

        // Buat data guru dengan menghubungkannya ke user yang telah dibuat
        $guru = Guru::create([
            'nama' => $request->input('nama'),
            'jenisKelamin' => $request->input('jenisKelamin'),
            'tanggalLahir' => $request->input('tanggalLahir'),
            'phone' => $request->input('phone'),
            'nip' => $request->input('nip'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'photo' => $photoPath,
            'user_id' => $user->id,
        ]);
        dd($guru);
        Session::flash('success', 'Data guru dan pengguna berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('guru');
    }
    public function edit($id){
        $guru = Guru::findOrFail($id);
        return view('pages.admin.master.guru.edit', compact('guru'));
    }
        public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($guru->photo) {
                Storage::disk('public')->delete($guru->photo);
            }
            // Upload the new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $guru->photo = $photoPath;
        }

        $guru->nama = $request->input('nama');
        $guru->jenisKelamin = $request->input('jenisKelamin');
        $guru->tanggalLahir = $request->input('tanggalLahir');
        $guru->phone = $request->input('phone');
        $guru->nip = $request->input('nip');
        $guru->email = $request->input('email');
        $guru->alamat = $request->input('alamat');
        $guru->save();

        Session::flash('success', 'Data guru berhasil diperbarui.'); 
        // Redirect to a specific route after successful update
        return redirect()->route('guru');
    }
        public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto jika ada
        if ($guru->photo) {
            Storage::disk('public')->delete($guru->photo);
        }

        // Hapus user terkait
        if ($guru->user) {
            $guru->user->delete();
        }

        $guru->delete();

        Session::flash('success', 'Data guru dan pengguna berhasil dihapus.');

        // Redirect to a specific route after successful deletion
        return redirect()->route('guru');
    }
    public function report(Request $request){
        if ($request->ajax()) {
            $guru = Guru::query();
            return Datatables::of($guru)
                ->addIndexColumn()
                ->make(true);
        }
    
        return view('pages.admin.laporan.guru.index');
    }
    public function pdf()
    {
        $guruData = Guru::all();
    
        $pdf = PDF::loadView('pages.admin.laporan.guru.cetak', compact('guruData'))
            ->setPaper('a3', 'portrait'); // Set paper size to A3 and orientation to portrait
        return $pdf->stream('data_guru.pdf');
    }
}   
