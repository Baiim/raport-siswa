<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Score;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Siswa::with('kelas')->get();
        if ($request->ajax()) {
            return Datatables::of($siswa)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('siswa.edit', $row->id); // Ganti dengan URL edit yang sesuai
                    $deleteUrl = route('siswa.destroy', $row->id);
                    
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf" data-url="' . $editUrl . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<form class="form-delete" action="' . $deleteUrl . '" method="POST" style="display:inline">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger btn-user btn-block btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </form>';
                    $btn .= '</div>';
    
                    return $btn;
                })
                ->addColumn('kelas_id', function ($transaction) {
                    return $transaction->kelas->namaKelas;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.master.siswa.index');
    }
    public function create(){
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('pages.admin.master.siswa.create', compact('kelas','jurusan'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction(); // Memulai transaksi
    
        try {
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
            }
    
            $user = User::create([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'level' => 2,
            ]);
    
            $siswa = Siswa::create([
                'nama' => $request->input('nama'),
                'jenisKelamin' => $request->input('jenisKelamin'),
                'tanggalLahir' => $request->input('tanggalLahir'),
                'phone' => $request->input('phone'),
                'nis' => $request->input('nis'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'orangTua' => $request->input('orangTua'),
                'kelas_id' => $request->input('kelas_id'),
                'jurusan' => $request->input('jurusan'),
                'photo' => $photoPath,
                'user_id' => $user->id,
            ]);
    
            DB::commit(); // Menyimpan perubahan ke database
    
            Session::flash('success', 'Data guru dan pengguna berhasil ditambahkan.'); 
            return redirect()->route('siswa');
        } catch (\Exception $e) {
            DB::rollback(); // Membatalkan transaksi jika terjadi kesalahan
    
            Session::flash('error', 'Terjadi kesalahan saat menambahkan data siswa.');
            return redirect()->back();
        }
    }
    public function nilai(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user (siswa)
        $siswa = $user->siswa; // Assuming the user has a relationship with Siswa model
    
        if (!$siswa) {
            abort(403, "You are not authorized to access this page.");
        }
    
        // Retrieve the scores for the student and specific class
        $scores = Score::where('siswa_id', $user->siswa->id)->get();
    
        return view('pages.admin.master.siswa.nilai', compact('siswa', 'scores'));
    }
    
        public function destroy($id)
    {
    $siswa = Siswa::findOrFail($id);

        // Hapus foto jika ada
        if ($siswa->photo) {
            Storage::disk('public')->delete($siswa->photo);
        }

        // Hapus user terkait
        if ($siswa->user) {
        $siswa->user->delete();
        }

    $siswa->delete();

        Session::flash('success', 'Data guru dan pengguna berhasil dihapus.');

        // Redirect to a specific route after successful deletion
        return redirect()->route('siswa');
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all(); 
        return view('pages.admin.master.siswa.edit', compact('siswa', 'kelas', 'jurusan'));
    }
    public function update(Request $request, $id)
{
    DB::beginTransaction(); // Begin transaction

    try {
        $siswa = Siswa::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($siswa->photo) {
                Storage::disk('public')->delete($siswa->photo);
            }
            // Upload the new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $siswa->photo = $photoPath;
        }

        $siswa->nama = $request->input('nama');
        $siswa->jenisKelamin = $request->input('jenisKelamin');
        $siswa->tanggalLahir = $request->input('tanggalLahir');
        $siswa->phone = $request->input('phone');
        $siswa->nis = $request->input('nis');
        $siswa->email = $request->input('email');
        $siswa->alamat = $request->input('alamat');
        $siswa->orangTua = $request->input('orangTua');
        $siswa->kelas_id = $request->input('kelas_id');
        $siswa->jurusan = $request->input('jurusan');
        $siswa->save();

        DB::commit(); // Save changes to the database

        Session::flash('success', 'Data siswa berhasil diperbarui.'); 
        return redirect()->route('siswa');
    } catch (\Exception $e) {
        DB::rollback(); // Rollback the transaction if an error occurs

        Session::flash('error', 'Terjadi kesalahan saat memperbarui data siswa.');
        return redirect()->back();
    }
}

public function report(Request $request){
{
    $kelas = Kelas::all();

    if ($request->ajax()) {
        return Datatables::of($kelas)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('siswa-data', ['kelas_id' => $row->id]);
                $btn = '<div class="btn-group" role="group">';
                $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf"><i class="fas fa-eye"></i></a>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('pages.admin.laporan.siswa.index', compact('kelas'));
}}
public function data(Request $request, $kelas_id)
{
    $kelas = Kelas::findOrFail($kelas_id);
    $siswa = $kelas->siswa;

    if ($request->ajax()) {
        return Datatables::of($siswa)
            ->addIndexColumn()
            ->make(true);
    }

    return view('pages.admin.laporan.siswa.data-siswa', compact('siswa', 'kelas'));
}
public function pdf(Request $request, $kelas_id)
{
    $kelas = Kelas::findOrFail($kelas_id);
    $siswa = $kelas->siswa;


    $pdf = PDF::loadView('pages.admin.laporan.siswa.cetak', compact('siswa', 'kelas'))
        ->setPaper('a3', 'portrait'); // Set paper size to A3 and orientation to portrait
    return $pdf->stream('data_guru.pdf');
}
}
