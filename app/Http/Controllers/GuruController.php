<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::query();
        if ($request->ajax()) {
            return Datatables::of($guru)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $editUrl = route('transaksi.generate-pdf', $row->id);
                    // $deleteUrl = route('transaksi.destroy', $row->id);
                    $editUrl = '';
                    $deleteUrl = '';
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf" data-url="' . $editUrl . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<form class="form-delete" action="' . $deleteUrl . '" method="POST" style="display:inline">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger btn-user btn-block btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </form>';
                    $btn .= '</div>';
    
                    return $btn;
                })
                // ->addColumn('package_name', function ($transaction) {
                //     return $transaction->package->name;
                // })
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

        Session::flash('success', 'Data guru dan pengguna berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('guru');
    }
}   
