@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>PMI</h1>
            <small>Data PMI yang sudah di input akan muncul disini !</small>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
             <div class="card">
                 <div class="header row">
                     <div class="col-md-12">
                         <h2>
                             Data PMI
                             <small>Data PMI saat ini</small>
                         </h2>
                     </div>
                                   
                 </div>
                 <div class="body">
                     <div class="table-responsive">
                         <table class="table">
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
