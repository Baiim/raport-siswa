@extends('layouts.admin')
@section('title')
    SMK | Edit Data Guru
@endsection
@section('content')
    @push('addon-style')
        <style>
            .preview-image {
                max-width: 200px;
                max-height: 200px;
                margin-top: 10px;
            }
        </style>
    @endpush
    <section class="content">
        <hr>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Data Guru</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('guru.update', ['id' => $guru->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text" name="nama" value="{{$guru->nama}}" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nama Guru" required>
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" required name="nip" value="{{$guru->nip}}" class="form-control"
                                        id="exampleInputPassword1" placeholder="NIP">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" readonly name="email" value="{{$guru->email}}" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" name="phone" value="{{$guru->phone}}" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" required value="{{$guru->tanggalLahir}}" name="tanggalLahir" class="form-control"
                                        id="exampleInputPassword1" placeholder="Tanggal Lahir" value="2000-01-01">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenisKelamin" class="form-control select2" style="width: 100%;">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control select2" style="width: 100%;">
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katholik">Katholik</option>
                                        <option value="hindu">Perempuan</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghuchu">Konguchu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="{{$guru->alamat}}" class="form-control" id="exampleInputPassword1"
                                        placeholder="Alamat" value="Bekasi" required>
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo" accept="image/*" class="form-control" id="exampleInputPassword1" onchange="previewImage(event)">
                                    <div class="preview-container">
                                        <img id="preview" class="preview-image" src="{{ $guru->photo ? asset($guru->photo) : asset('dist/img/pp.png') }}" alt="Preview">
                                    </div>
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
            function previewImage(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var previewElement = document.getElementById('preview');
                        previewElement.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
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
