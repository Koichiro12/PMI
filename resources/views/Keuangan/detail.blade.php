@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Detail Pembayaran</h1>
            <small>Detail Pembayaran akan tampil di bawah ini !</small>
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
                                Detail Pembayaran
                                <small>Detail Pembayaran di bawah ini !</small>
                            </h2>
                        </div>

                    </div>
                    <div class="body">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

