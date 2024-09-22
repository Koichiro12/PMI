@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>{{isset($data) ? 'Edit' : 'Tambah' }} Pengguna</h1>
            <small>{{isset($data) ? 'Edit' : 'Tambah' }} Data Pengguna dengan mengisikan form disini !</small>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-10">
                            <h2>
                                {{isset($data) ? 'Edit' : 'Tambah' }} Data Pengguna
                                <small>{{isset($data) ? 'Edit' : 'Tambah' }} Data Pengguna pada form dibawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('pengguna.index')}}" class="btn btn-danger btn-block">Data Pengguna</a>
                        </div>

                    </div>
                    <div class="body">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
