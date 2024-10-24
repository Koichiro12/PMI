@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1>Biodata</h1>
            <small>The biodata that has been entered will appear here!</small>
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
                            Biodata
                            <small>Biodata Now !</small>
                        </h2>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('biodata.create')}}" class="btn btn-primary btn-block" name="tambah" id="tambah" >Add</a>
                    </div>                   
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table" id="tbl_list">
                            <thead>
                                <th>No</th>
                                <th>Code</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Place Of Birth</th>
                                <th>Date Birt</th>
                                <th>L/P</th>
                                <th>Citizenship</th>
                                <th>Education</th>
                                <th>Language</th>
                                <th>Action</th>
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
                ajax: '{{ route('biodata.list') }}',
                columns: [{
                        data: "id",
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'kode_biodata',
                        name: 'kode_biodata'
                    },
                    {
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
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'kewarganegaraan',
                        name: 'kewarganegaraan'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'bahasa',
                        name: 'bahasa'
                    },
                    {
                        data: "id",
                        name: "id",
                        render: function(data, type, row, meta) {
                            let id = data;
                            return '<form action="{!! url()->current() . "/'+id+'" !!}" method="POST" enctype="multipart/form-data"> @csrf @method('DELETE') <a href="{!! url()->current() . "/'+id+'/printPdf" !!}" class="btn btn-primary btn-block m-2" name="print_pdf" id="print_pdf" target="_blank" >Print / Download (PDF) </a> <a href="{!! url()->current() . "/'+id+'/edit" !!}" class="btn btn-warning btn-block m-2" name="edit" id="edit" >Update</a><button type="submit" onclick="confirmDelete(event,this)" class="btn btn-danger btn-block m-2">Delete</button></form>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
