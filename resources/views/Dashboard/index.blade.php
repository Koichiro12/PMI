@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>DASHBOARD</h1>
            <small>Selamat Datang {{auth()->user()->name}}, Ada yang bisa dibantu ?</small>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">diversity_1</i>
                    </div>
                    <div class="content">
                        <div class="text">Biodata</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">group</i>
                    </div>
                    <div class="content">
                        <div class="text">Pengguna</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000"
                            data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
     
        <!-- #END# CPU Usage -->
    </div>
@endsection
