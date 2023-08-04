<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Session;

class SemesterController extends Controller
{
    public function index(Request $request)
    {
        $semester = Semester::query();
        if ($request->ajax()) {
            return Datatables::of($semester)
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
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Aktif</span>';
                    } else {
                        return '<span class="badge badge-danger">Tidak Aktif</span>';
                    }
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    
        return view('pages.admin.master.semester.index');
    }
    public function create(){
        return view('pages.admin.master.semester.create');
    }
    public function store(Request $request)
    {
        // Buat data guru dengan menghubungkannya ke user yang telah dibuat
        $kelas = Semester::create([
            'semester' => $request->input('semester'),
            'tahunAjaran' => $request->input('tahunAjaran'),
            'status' => 1
        ]);

        Session::flash('success', 'Data Tahun Ajaran berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('tahun-ajaran');
    }
}
