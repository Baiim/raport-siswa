@extends('layouts.admin')
@section('title')
    SMK | Edit Nilai Siswa
@endsection
@section('content')
    <section class="content">
        <hr>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                                </div>
                                <div class="col">
                                    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                                </div>
                                <div class="col">
                                    <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
                                </div>
                                <div class="col">
                                    <p><strong>Kelas:</strong> {{ $siswa->kelas->namaKelas }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('update-nilai.update', $siswa->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @foreach ($mapels as $mapel)
                                    @php
                                        $allowedJurusan = ['STK-AK', 'STK-MM', 'STK-TKR', 'STK-TKJ'];
                                    @endphp
                                    @php
                                        $score = $scores->where('mapel_id', $mapel->id)->first();
                                    @endphp
                                    @if (in_array($siswa->jurusan, $allowedJurusan) && $siswa->jurusan == $mapel->code)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="">{{ $mapel->mataPelajaran }}</label>
                                            <input type="hidden" name="scores[{{ $mapel->id }}][id]"
                                                value="{{ $score->id }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="scores[{{ $mapel->id }}][tugas]"
                                                class="form-control" value="{{ $score->tugas }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="scores[{{ $mapel->id }}][uas]"
                                                class="form-control" value="{{ $score->uas }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="scores[{{ $mapel->id }}][uts]"
                                                class="form-control" value="{{ $score->uts }}">
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                            </div>
                            <!-- /.card-body -->
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
