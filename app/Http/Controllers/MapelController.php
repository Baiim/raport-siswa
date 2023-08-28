<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Jurusan;
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
                    $editUrl = route('mapel.edit', $row->id); // Ganti dengan URL edit yang sesuai
                    $deleteUrl = route('mapel.destroy', $row->id);
                    
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
        $jurusan = Jurusan::all();
        return view('pages.admin.master.matapelajaran.create', compact('jurusan'));
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
    public function destroy($id)
    {
        $item = Mapel::findorFail($id);
        $item->delete();

        return redirect()->route('mapel');

    }

    public function edit($id){
        $mapel = Mapel::findOrFail($id);
        $jurusan = Jurusan::all(); 
        return view('pages.admin.master.matapelajaran.edit', compact('mapel','jurusan'));
    }
    public function update(Request $request, $id)
{
    $mapel = Mapel::findOrFail($id);

    try {
        // Update the Mapel's data
        $mapel->mataPelajaran = $request->input('mataPelajaran');
        $mapel->code = $request->input('code');
        $mapel->kkm = $request->input('kkm');
        $mapel->save();

        Session::flash('success', 'Data Mapel berhasil diperbarui.'); 
        // Redirect to a specific route after successful update
        return redirect()->route('mapel');
    } catch (\Exception $e) {
        Session::flash('error', 'Terjadi kesalahan saat memperbarui data Mapel.');
        return redirect()->back();
    }
}

}
