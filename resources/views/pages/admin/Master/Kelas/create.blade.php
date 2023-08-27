@extends('layouts.admin')
@section('title')
    SMK | Create Data Kelas
@endsection
@section('content')
    <section class="content">
        <hr>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('kelas.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" name="namaKelas" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nama Kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Wali Kelas</label>
                                    <select name="waliKelas" class="form-control select2" style="width: 100%;">
                                        @foreach ($guru as $guruItem)
                                            <option value="{{ $guruItem->nama }}">{{ $guruItem->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
