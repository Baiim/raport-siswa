<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Guru;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::query();
        if ($request->ajax()) {
            return Datatables::of($kelas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('kelas.edit', $row->id); // Ganti dengan URL edit yang sesuai
                    $deleteUrl = route('kelas.destroy', $row->id);
                    
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
    
        return view('pages.admin.master.kelas.index');
    }
    public function create(){
        $guru = Guru::all();
        return view('pages.admin.master.kelas.create', compact('guru'));
    }
    public function store(Request $request)
    {
        // Buat data guru dengan menghubungkannya ke user yang telah dibuat
        $kelas = Kelas::create([
            'namaKelas' => $request->input('namaKelas'),
            'waliKelas' => $request->input('waliKelas'),
        ]);

        Session::flash('success', 'Data Kelas berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('kelas');
    }
    public function destroy($id)
    {
        $item = Kelas::findorFail($id);
        $item->delete();

        return redirect()->route('kelas');

    }
    public function edit($id){
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('pages.admin.master.kelas.edit', compact('kelas', 'guru'));
    }
    public function update(Request $request, $id)
{
    $kelas = Kelas::findOrFail($id);

    try {
        // Update the Kelas's data
        $kelas->namaKelas = $request->input('namaKelas');
        $kelas->waliKelas = $request->input('waliKelas');
        $kelas->save();

        Session::flash('success', 'Data Kelas berhasil diperbarui.'); 
        // Redirect to a specific route after successful update
        return redirect()->route('kelas');
    } catch (\Exception $e) {
        Session::flash('error', 'Terjadi kesalahan saat memperbarui data Kelas.');
        return redirect()->back();
    }
}

}
