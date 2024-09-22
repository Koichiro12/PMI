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
                        <a href="#" class="btn btn-primary btn-block" name="tambah" id="tambah" >Tambah</a>
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
