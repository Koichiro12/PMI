@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Pengguna</h1>
            <small>Data Pengguna yang sudah terdaftar akan muncul disini !</small>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-10">
                            <h2>
                                Data Pengguna
                                <small>Data Pengguna saat ini</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('pengguna.create')}}" class="btn btn-primary btn-block">Tambah</a>
                        </div>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table" id="tbl_list">
                                <thead>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('content-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pengguna.list') }}',
                columns: [{
                        data: "id",
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'foto',
                        name: 'foto',
                        render: function(data, type, row, meta) {
                            let dates = '{!!asset("assets/images/user.png")!!}';
                            if(data != '-'){
                                dates = '{!!asset("uploads/'+data+'")!!}';
                            }
                            return '<img src="'+dates+'" width="50" height="50" class="img img-circle" alt="User"  />';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: "id",
                        name: "id",
                        render: function(data, type, row, meta) {
                            let id = data;
                            return '<form action="{!! url()->current() . "/'+id+'" !!}" method="POST" enctype="multipart/form-data"> @csrf @method('DELETE') <a href="{!! url()->current() . "/'+id+'/edit" !!}" class="btn btn-warning" name="edit" id="edit" >edit</a><button type="submit" onclick="confirmDelete(event,this)" class="btn btn-danger">hapus</button></form>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
