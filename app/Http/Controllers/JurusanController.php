<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $jurusan = Jurusan::query();
        if ($request->ajax()) {
            return Datatables::of($jurusan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('jurusan.destroy', $row->id); // Ganti dengan URL edit yang sesuai
                    $deleteUrl = route('jurusan.destroy', $row->id);
                    
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
    
        return view('pages.admin.master.jurusan.index');
    }
    public function create(){
        return view('pages.admin.master.jurusan.create');
    }
    public function store(Request $request)
    {
        // Buat data guru dengan menghubungkannya ke user yang telah dibuat
        $kelas = Jurusan::create([
            'kode' => $request->input('kode'),
            'namaJurusan' => $request->input('namaJurusan'),
        ]);

        Session::flash('success', 'Data Jurusan berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('jurusan');
    }
    public function destroy($id)
    {
        $item = Jurusan::findorFail($id);
        $item->delete();

        return redirect()->route('jurusan');

    }
}
