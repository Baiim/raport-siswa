@extends('layouts.admin')
@section('title')
    SMK | Input Nilai Siswa
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
                                    <p><strong>Kelas:</strong> {{ $siswa->kelas->namaKelas }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Masukan Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('input-nilai.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                @foreach ($mapels as $item)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="">{{ $item->mataPelajaran }}</label>
                                            <!-- Add a hidden input field for the mapel_id -->
                                            <input type="hidden" name="mapel_id[]" value="{{ $item->id }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="tugas[]" class="form-control"
                                                placeholder="Nilai Tugas">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="uas[]" class="form-control"
                                                placeholder="Nilai UAS">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="uts[]" class="form-control"
                                                placeholder="Nilai UTS">
                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
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
    @push('addon-script')
        <script>
            // Check if there is a flash message for success
            var successMessage = "{{ Session::get('success') }}";
            if (successMessage) {
                // Show the success alert using SweetAlert2
                Swal.fire({
                    title: 'Success!',
                    text: successMessage,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    @endpush
@endsection
