@extends('layouts.admin')
@section('title')
    SMK | Edit Data Mata Pelajaran
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
                            <h3 class="card-title">Ubah Data Mata Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('mapel.update', ['id' => $mapel->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <label for="">Kode Mata Pelajaran</label>
                                <select name="code" class="form-control select2" style="width: 100%;">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->kode }}" {{ $mapel->code === $item->kode ? 'selected' : '' }}>
                                            {{ $item->kode }}
                                        </option>
                                    @endforeach
                                </select>                                
                                <div class="form-group">
                                    <label>KKM Mata Pelajaran</label>
                                    <input type="number" name="kkm" value="{{$mapel->kkm}}" class="form-control" id="exampleInputPassword1"
                                        placeholder="Mata Pelajaran" value="70" required>
                                </div>
                                <div class="form-group">
                                    <label>Mata Pelajaran</label>
                                    <input type="text" name="mataPelajaran" value="{{$mapel->mataPelajaran}}" class="form-control"
                                        id="exampleInputPassword1" placeholder="Mata Pelajaran" required>
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
