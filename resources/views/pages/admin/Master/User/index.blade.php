@extends('layouts.admin')
@section('title', 'SMK | Data User')
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
                                <h1 class="h5 mb-0 text-gray-800">Data User</h1>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'level',
                        name: 'level',
                        render: function(data, type, row) {
                            // Convert level value to role name
                            if (data === 0) {
                                return 'Admin';
                            } else if (data === 1) {
                                return 'Guru';
                            } else if (data === 2) {
                                return 'Siswa';
                            } else {
                                return 'Unknown';
                            }
                        }
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
