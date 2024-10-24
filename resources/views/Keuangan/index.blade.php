@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Payment</h1>
            <small>Payment data that has been entered will appear here!</small>
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
                        <div class="col-md-12">
                            <h2>
                                Payment
                                <small>Current Payment</small>
                            </h2>
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
                                    <th>Place of birth</th>
                                    <th>Date birth</th>
                                    <th>L/P</th>
                                    <th>Cost</th>
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
                            return '<a href="{!! url()->current() . "/'+id+'/Biaya" !!}" class="btn btn-success btn-block m-2" name="set_biaya" id="set_biaya" >set Cost </a>';
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