@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1>Biodata</h1>
            <small>Data Biodata yang sudah di input akan muncul disini !</small>
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
                            Data Biodata
                            <small>Data biodata saat ini</small>
                        </h2>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('biodata.create')}}" class="btn btn-primary btn-block" name="tambah" id="tambah" >Tambah</a>
                    </div>                   
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table" id="tbl_list">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>L/P</th>
                                <th>Kewarganegaraan</th>
                                <th>Pendidikan</th>
                                <th>Bahasa</th>
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
                            return '<form action="{!! url()->current() . "/'+id+'" !!}" method="POST" enctype="multipart/form-data"> @csrf @method('DELETE') <a href="{!! url()->current() . "/'+id+'/printPdf" !!}" class="btn btn-primary btn-block m-2" name="print_pdf" id="print_pdf" target="_blank" >Download (PDF) </a> <a href="{!! url()->current() . "/'+id+'/edit" !!}" class="btn btn-warning btn-block m-2" name="edit" id="edit" >edit</a><button type="submit" onclick="confirmDelete(event,this)" class="btn btn-danger btn-block m-2">hapus</button></form>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
