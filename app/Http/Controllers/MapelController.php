<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Session;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = Mapel::query();
        if ($request->ajax()) {
            return Datatables::of($mapel)
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
    
        return view('pages.admin.master.matapelajaran.index');
    }
    public function create(){
        return view('pages.admin.master.matapelajaran.create');
    }
    public function store(Request $request)
    {
        // Buat data guru dengan menghubungkannya ke user yang telah dibuat
        $kelas = Mapel::create([
            'mataPelajaran' => $request->input('mataPelajaran'),
            'code' => $request->input('code'),
            'kkm' => $request->input('kkm'),
        ]);

        Session::flash('success', 'Data Mapel berhasil ditambahkan.'); 
        // Redirect to a specific route after successful creation
        return redirect()->route('mapel');
    }
}
