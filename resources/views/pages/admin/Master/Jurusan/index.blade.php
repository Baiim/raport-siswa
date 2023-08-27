@extends('layouts.admin')
@section('title', 'SMK | Data Jurusan')
@section('content')
    <!-- Begin Page Content -->
    <section class="content">
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                                <h1 class="h5 mb-0 text-gray-800">Data Jurusan</h1>
                                <a href="{{ route('jurusan.create') }}"
                                    class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i
                                        class="fas fa- fa-sm text-white-50"></i> Tambah Data Jurusan</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Jurusan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>

@endsection

@push('addon-script')
    <!-- Ensure you have included jQuery and other required scripts before the DataTable script -->
    <!-- Add any additional DataTables-related scripts here -->
    <script>
        // AJAX DataTable
        $(document).ready(function() {
            var datatable = $('#crudTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}', // Replace this with the correct route for data retrieval
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'namaJurusan',
                        name: 'namaJurusan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ]
            });
        });
    </script>
@endpush
