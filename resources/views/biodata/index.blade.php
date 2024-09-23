@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1>Biodata</h1>
            <small>Data Biodata yang sudah di input akan muncul disini !</small>
        </div>

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
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
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
                        data: 'name',
                        name: 'name'
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
