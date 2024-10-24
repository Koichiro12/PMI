@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Selected Information</h1>
            <small>Selected Information that has been input will appear here!</small>
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
                                Selected Information
                             <small>Current Selected Information</small>
                         </h2>
                     </div>
                     <div class="col-md-2">
                        <a href="{{route('selected_information.create')}}" class="btn btn-primary btn-block" name="tambah" id="tambah" >Add</a>
                    </div>         
                                   
                 </div>
                 <div class="body">
                     <div class="table-responsive">
                         <table class="table" id="tbl_list">
                             <thead>
                                 <th>No</th>
                                 <th>Job Order No</th>
                                 <th>Serial Number</th>
                                 <th>English Name</th>
                                 <th>Chinese Name</th>
                                 <th>TMA</th>
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
            ajax: '{{ route('selected_information.list') }}',
            columns: [{
                    data: "id",
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data:"job_order_no",
                    name:"job_order_no"
                },
                {
                    data:"nomor_seri",
                    name:"nomor_seri"
                },
                {
                    data:"nama_inggris",
                    name:"nama_inggris"
                },
                {
                    data:"nama_tionghoa",
                    name:"nama_tionghoa"
                },
                {
                    data:"tma",
                    name:"tma"
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
