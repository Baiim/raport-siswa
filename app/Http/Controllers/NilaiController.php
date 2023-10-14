<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mapel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();
    
        if ($request->ajax()) {
            return Datatables::of($kelas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('data-siswa', ['kelas_id' => $row->id]);
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf"><i class="fas fa-eye"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.data.nilai.index', compact('kelas'));
    }

    public function dataSiswa(Request $request, $kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $siswa = $kelas->siswa;
    
        if ($request->ajax()) {
            return Datatables::of($siswa)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    
                    $scoreExists = Score::where('siswa_id', $row->id)->exists();
    
                    if ($scoreExists) {
                        $updateNilaiUrl = route('update-nilai', ['siswa_id' => $row->id]);
                        $btn = '<a href="' . $updateNilaiUrl . '" class="btn btn-warning"><i class="fas fa-edit"></i></a>';
                    } else {
                        $inputNilaiUrl = route('input-nilai', ['siswa_id' => $row->id]);
                        $btn = '<a href="' . $inputNilaiUrl . '" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>';
                    }
    
                    return $btn;
                })
                ->addColumn('tugas', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalTugas = 0;
                    $countTugas = 0;
                
                    foreach ($scores as $score) {
                        $totalTugas += $score->tugas;
                        $countTugas++;
                    }
                
                    $rataTugas = $countTugas > 0 ? $totalTugas / $countTugas : 0;
                
                    return round($rataTugas, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('uts', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalUTS = 0;
                    $countUTS = 0;
                
                    foreach ($scores as $score) {
                        $totalUTS += $score->uts;
                        $countUTS++;
                    }
                
                    $rataUTS = $countUTS > 0 ? $totalUTS / $countUTS : 0;
                
                    return round($rataUTS, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('uas', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalUAS = 0;
                    $countUAS = 0;
                
                    foreach ($scores as $score) {
                        $totalUAS += $score->uas;
                        $countUAS++;
                    }
                
                    $rataUAS = $countUAS > 0 ? $totalUAS / $countUAS : 0;
                
                    return round($rataUAS, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('grade', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalNilai = 0;
                    $countNilai = 0;
                
                    foreach ($scores as $score) {
                        $totalNilai += ($score->tugas + $score->uts + $score->uas);
                        $countNilai++;
                    }
                
                    $rataNilai = $countNilai > 0 ? $totalNilai / ($countNilai * 3) : 0;
                
                    if ($rataNilai >= 90) {
                        return 'A';
                    } elseif ($rataNilai >= 80) {
                        return 'B';
                    } elseif ($rataNilai >= 70) {
                        return 'C';
                    } else {
                        return 'D';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.data.nilai.data-siswa', compact('siswa', 'kelas'));
    }
        public function inputNilai($siswa_id)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        $mapels = Mapel::all();
        // Fetch other data as needed for the view, e.g., subjects, existing scores, etc.

        return view('pages.admin.data.nilai.input-nilai', compact('siswa', 'mapels'));
    }

    public function store(Request $request)
{
    $mapelIds = $request->input('mapel_id');
    $tugas = $request->input('tugas');
    $uas = $request->input('uas');
    $uts = $request->input('uts');
    $siswa_id = $request->input('siswa_id');

    // Loop through the submitted values and save them to the scores table
    foreach ($mapelIds as $index => $mapel_id) {
        $score = new Score();
        $score->siswa_id = $siswa_id;
        $score->mapel_id = $mapel_id;
        $score->tugas = $tugas[$index];
        $score->uas = $uas[$index];
        $score->uts = $uts[$index];

        // Calculate the average score
        $averageScore = ($score->tugas + $score->uas + $score->uts) / 3;

        // Determine the grade based on the average score
        if ($averageScore >= 90) {
            $score->grade = 'A';
        } elseif ($averageScore >= 80) {
            $score->grade = 'B';
        } elseif ($averageScore >= 70) {
            $score->grade = 'C';
        } else {
            $score->grade = 'D';
        }
        $score->save();
    }

    // Redirect or return a response as needed
    return redirect()->route('data-nilai')->with('success', 'Scores saved successfully!');
}
public function editNilai($siswa_id)
{
    $siswa = Siswa::findOrFail($siswa_id);
    $mapels = Mapel::all();
    $scores = Score::where('siswa_id', $siswa_id)->get();

    return view('pages.admin.data.nilai.update-nilai', compact('siswa', 'mapels', 'scores'));
}

public function update(Request $request, $siswa_id)
{
    $scoresData = $request->input('scores');

    // Loop through the submitted values and update the scores table
    foreach ($scoresData as $scoreData) {
        $score = Score::find($scoreData['id']);
        $score->tugas = $scoreData['tugas'];
        $score->uas = $scoreData['uas'];
        $score->uts = $scoreData['uts'];

        // Calculate the average score
        $averageScore = ($score->tugas + $score->uas + $score->uts) / 3;

        // Determine the grade based on the average score
        if ($averageScore >= 90) {
            $score->grade = 'A';
        } elseif ($averageScore >= 80) {
            $score->grade = 'B';
        } elseif ($averageScore >= 70) {
            $score->grade = 'C';
        } else {
            $score->grade = 'D';
        }
        $score->save();
    }

    // Redirect or return a response as needed
    return redirect()->route('data-nilai')->with('success', 'Scores updated successfully!');
}

public function report(Request $request){
    {
        $kelas = Kelas::all();
    
        if ($request->ajax()) {
            return Datatables::of($kelas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('data-nilai-siswa', ['kelas_id' => $row->id]);
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-primary btn-block btn-user generate-pdf"><i class="fas fa-eye"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.laporan.nilai.index', compact('kelas'));
    }}

    public function data(Request $request, $kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $siswa = $kelas->siswa;
    
        if ($request->ajax()) {
            return Datatables::of($siswa)
                ->addIndexColumn()
                ->addColumn('tugas', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalTugas = 0;
                    $countTugas = 0;
                
                    foreach ($scores as $score) {
                        $totalTugas += $score->tugas;
                        $countTugas++;
                    }
                
                    $rataTugas = $countTugas > 0 ? $totalTugas / $countTugas : 0;
                
                    return round($rataTugas, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('uts', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalUTS = 0;
                    $countUTS = 0;
                
                    foreach ($scores as $score) {
                        $totalUTS += $score->uts;
                        $countUTS++;
                    }
                
                    $rataUTS = $countUTS > 0 ? $totalUTS / $countUTS : 0;
                
                    return round($rataUTS, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('uas', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalUAS = 0;
                    $countUAS = 0;
                
                    foreach ($scores as $score) {
                        $totalUAS += $score->uas;
                        $countUAS++;
                    }
                
                    $rataUAS = $countUAS > 0 ? $totalUAS / $countUAS : 0;
                
                    return round($rataUAS, 2); // Mengambil 2 angka di belakang koma
                })
                ->addColumn('grade', function ($row) {
                    $scores = Score::where('siswa_id', $row->id)->get();
                    $totalNilai = 0;
                    $countNilai = 0;
                
                    foreach ($scores as $score) {
                        $totalNilai += ($score->tugas + $score->uts + $score->uas);
                        $countNilai++;
                    }
                
                    $rataNilai = $countNilai > 0 ? $totalNilai / ($countNilai * 3) : 0;
                
                    if ($rataNilai >= 90) {
                        return 'A';
                    } elseif ($rataNilai >= 80) {
                        return 'B';
                    } elseif ($rataNilai >= 70) {
                        return 'C';
                    } else {
                        return 'D';
                    }
                })
                ->make(true);
        }
    
        return view('pages.admin.laporan.nilai.data-nilai', compact('siswa', 'kelas'));
    }

    public function pdf(Request $request, $kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $siswaCollection = $kelas->siswa;
    
        $nilaiCollection = [];
        
        // Loop melalui koleksi siswa untuk membangun nilai masing-masing siswa
        foreach ($siswaCollection as $siswa) {
            $scores = Score::where('siswa_id', $siswa->id)->get();
    
            $totalTugas = 0;
            $totalUTS = 0;
            $totalUAS = 0;
            $totalNilai = 0;
            $countTugas = 0;
            $countUTS = 0;
            $countUAS = 0;
            $countNilai = 0;
    
            foreach ($scores as $score) {
                $totalTugas += $score->tugas;
                $totalUTS += $score->uts;
                $totalUAS += $score->uas;
                $totalNilai += ($score->tugas + $score->uts + $score->uas);
                $countTugas++;
                $countUTS++;
                $countUAS++;
                $countNilai++;
            }
    
            $rataTugas = $countTugas > 0 ? $totalTugas / $countTugas : 0;
            $rataUTS = $countUTS > 0 ? $totalUTS / $countUTS : 0;
            $rataUAS = $countUAS > 0 ? $totalUAS / $countUAS : 0;
            $rataNilai = $countNilai > 0 ? $totalNilai / ($countNilai * 3) : 0;
    
            $grade = 'D'; // Default grade
            if ($rataNilai >= 90) {
                $grade = 'A';
            } elseif ($rataNilai >= 80) {
                $grade = 'B';
            } elseif ($rataNilai >= 70) {
                $grade = 'C';
            }
    
            $nilaiCollection[] = [
                'siswa' => $siswa,
                'rataTugas' => round($rataTugas, 2),
                'rataUTS' => round($rataUTS, 2),
                'rataUAS' => round($rataUAS, 2),
                'grade' => $grade,
            ];
        }
    
        // Selanjutnya, Anda memiliki nilaiCollection yang berisi informasi nilai masing-masing siswa.
        
        $pdf = PDF::loadView('pages.admin.laporan.nilai.cetak', compact('kelas', 'nilaiCollection'))
            ->setPaper('a3', 'portrait'); // Set paper size to A3 and orientation to portrait
    
        // Ganti nama file PDF menjadi sesuatu yang lebih spesifik, seperti nama kelas atau tanggal, dll.
        return $pdf->stream('laporan_nilai.pdf');
    }
    
}

    
