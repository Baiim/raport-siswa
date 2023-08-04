@extends('layouts.admin')
@section('title')
    Dashboard | School
@endsection
@section('content')
    @push('addon-style')
        <style>
            /* Custom CSS for green transparent card */
            .custom-card {
                background-color: rgba(40, 167, 69, 0.5);
                /* Green transparent background */
                border: 1px solid rgba(40, 167, 69, 0.8);
                /* Darker green border */
            }
        </style>
    @endpush
    <div class="container-fluid">
        <div class="content-header">
            <div class="container mt-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Hallo, <strong>{{ Auth::user()->name }}</strong></h5>
                        <p class="card-text">Selamat data di sistem pengolahan nilai SMK DEWANTARA</p>
                        <ul>
                            <li>Admin : Dapat mengakses semua menu pada aplikasi. </li>
                            <li>Guru: Dapat mengakses pengolahan nilai dan data siswa.</li>
                            <li>Siswa: Dapat mengakses data nilai dan mencetak data nilai</li>
                        </ul>
                        <p class="card-text">Demikian pengumuman ini. Terima kasih atas perhatiannya.</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- Small boxes (Stat box) -->
        @if (Auth::user()->level === 0)
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $kelas }}</h3>

                            <p>Jumlah Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('kelas') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $siswa }}</h3>

                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('siswa') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $guru }}</h3>

                            <p>Jumlah Guru</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('guru') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $user }}</h3>

                            <p>Jumlah User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('user') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        @endif
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
