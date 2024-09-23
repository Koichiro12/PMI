@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> {{isset($data) ? 'Edit' : 'Tambah'}} Biodata</h1>
            <small> {{isset($data) ? 'Edit' : 'Tambah'}} Data Biodata dengan mengisikan form disini !</small>
        </div>
        <div class="row clearfix">
           <div class="col-md-12">
            <div class="card">
                <div class="header row">
                    <div class="col-md-10">
                        <h2>
                            {{isset($data) ? 'Edit' : 'Tambah'}} Data Biodata
                            <small>{{isset($data) ? 'Edit' : 'Tambah'}} Data biodata pada form dibawah ini !</small>
                        </h2>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('biodata.index')}}" class="btn btn-danger btn-block" name="tambah" id="tambah" >Data Biodata</a>
                    </div>                   
                </div>
                <div class="body">
                    
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection

