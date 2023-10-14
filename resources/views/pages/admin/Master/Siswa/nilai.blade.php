@extends('layouts.admin')
@section('title', 'SMK | Data Nilai Siswa')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 my-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('storage/' . $siswa->photo) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $siswa->nama }}</h3>
                            <p class="text-muted text-center">{{ $siswa->nis }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kelas</b> <span class="float-right">{{ $siswa->kelas->namaKelas }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <span class="float-right">{{ $siswa->jenisKelamin }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <span class="float-right">{{ $siswa->alamat }}</span>
                                </li>
                            </ul>
                            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                        </div>
                    </div>
                </div>

                <div class="col-md-9 my-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                                <h1 class="h5 mb-0 text-gray-800">Data Siswa</h1>
                                <a href="{{ route('raport-siswa') }}"
                                    class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
                                    <i class="fas fa-print fa-sm text-white-50 mr-1"></i> Cetak Nilai
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($scores->isEmpty())
                                <div class="alert alert-info">
                                    Belum ada nilai.
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama Pelajaran</th>
                                            <th>Nilai Tugas</th>
                                            <th>Nilai UAS</th>
                                            <th>Nilai UTS</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scores as $index => $score)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $score->mapel->code }}</td>
                                                <td>{{ $score->mapel->mataPelajaran }}</td>
                                                <td>{{ $score->tugas }}</td>
                                                <td>{{ $score->uas }}</td>
                                                <td>{{ $score->uts }}</td>
                                                <td>{{ $score->grade }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
