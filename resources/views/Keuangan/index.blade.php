@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Biodata</h1>
            <small>Data Biodata yang sudah di input akan muncul disini !</small>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-12">
                            <h2>
                                Data Keuangan
                                <small>Data Keuangan saat ini</small>
                            </h2>
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
                                    <th>Biaya</th>
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
                ajax: '{{ route('keuangan.list') }}',
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
                        data: "id",
                        name: "id",
                        render: function(data, type, row, meta) {
                            let id = data;
                            return '<a href="{!! url()->current() . "/'+id+'/setBiaya" !!}" class="btn btn-success btn-block m-2" name="set_biaya" id="set_biaya" >Biaya </a>';
                        }
                    },
                    {
                        data: "id",
                        name: "id",
                        render: function(data, type, row, meta) {
                            let id = data;
                            return '<a href="{!! url()->current() . "/'+id+'/detail" !!}" class="btn btn-primary btn-block m-2" name="print_pdf" id="print_pdf" >Detail </a>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection