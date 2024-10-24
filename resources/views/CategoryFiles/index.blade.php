@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Category Files</h1>
            <small>The PMI file categories that have been input will appear here!</small>
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
                            Category Files
                             <small>Category Files Now</small>
                         </h2>
                     </div>
                     <div class="col-md-2">
                        <a href="{{route('category_files.create')}}" class="btn btn-primary btn-block" name="tambah" id="tambah" >Add</a>
                    </div>         
                                   
                 </div>
                 <div class="body">
                     <div class="table-responsive">
                         <table class="table" id="tbl_list">
                             <thead>
                                 <th>No</th>
                                 <th>Category</th>
                                 <th>Status</th>
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
            ajax: '{{ route('kategori_file.list') }}',
            columns: [{
                    data: "id",
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'category_files',
                    name: 'category_files'
                },
                {
                    data: 'category_status',
                    name: 'category_status',
                    render: function(data, type, row, meta) {
                        if(data === '1'){
                           return '<span class="badge bg-green">Active</span>';
                        }
                        return '<span class="badge bg-danger">Non Active</span>';
                    }
                },
                {
                    data: "id",
                    name: "id",
                    render: function(data, type, row, meta) {
                        let id = data;
                        return '<form action="{!! url()->current() . "/'+id+'" !!}" method="POST" enctype="multipart/form-data"> @csrf @method('DELETE')<a href="{!! url()->current() . "/'+id+'/edit" !!}" class="btn btn-warning btn-block m-2" name="edit" id="edit" >Update</a><button type="submit" onclick="confirmDelete(event,this)" class="btn btn-danger btn-block m-2">Delete</button></form>';
                    }
                },
            ]
        });
    });
</script>
@endsection
