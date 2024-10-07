@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Selected Information</h1>
            <small>Data Selected Information Pembayaran PMI yang sudah di input akan muncul disini !</small>
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
                             Data Selected Information
                             <small>Data Selected Information saat ini</small>
                         </h2>
                     </div>
                     <div class="col-md-2">
                        <a href="{{route('selected_information.create')}}" class="btn btn-primary btn-block" name="tambah" id="tambah" >Tambah</a>
                    </div>         
                                   
                 </div>
                 <div class="body">
                     <div class="table-responsive">
                         <table class="table" id="tbl_list">
                             <thead>
                                 <th>No</th>
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
            ajax: '{{ route('selected_information.list') }}',
            columns: [{
                    data: "id",
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "id",
                    name: "id",
                    render: function(data, type, row, meta) {
                        let id = data;
                        return '<form action="{!! url()->current() . "/'+id+'" !!}" method="POST" enctype="multipart/form-data"> @csrf @method('DELETE')<a href="{!! url()->current() . "/'+id+'/edit" !!}" class="btn btn-warning btn-block m-2" name="edit" id="edit" >edit</a><button type="submit" onclick="confirmDelete(event,this)" class="btn btn-danger btn-block m-2">hapus</button></form>';
                    }
                },
            ]
        });
    });
</script>
@endsection
