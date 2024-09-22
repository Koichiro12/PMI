@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Profile</h1>
            <small>Profile Pengguna anda akan muncul disini !</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Profile Pengguna
                            <small>Profile anda sebagai pengguna</small>
                        </h2>

                    </div>
                    <div class="body">
                        <center>
                            Profile
                            <div class="image">
                                <img src="{{ $data->foto != '-' ? asset('uploads/'.$data->foto) : asset('assets/images/user.png') }}"
                                    width="100" height="100" class="img img-circle" alt="User" />
                            </div>
                            <br>
                            <span class="badge bg-green">{{ $data->role }}</span>
                        </center>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td width="25%">Nama</td>
                                    <td>: {{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td width="25%">Username</td>
                                    <td>: {{ $data->username }}</td>
                                </tr>
                                <tr>
                                    <td width="25%">Email</td>
                                    <td>: {{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td width="25%">Password</td>
                                    <td>: ******</td>
                                </tr>
                                <tr>
                                    <td width="25%">Role</td>
                                    <td>: {{ $data->role }}</td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('logout') }}" class="btn btn-block bg-red a-confirm">Sign Out</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Profile
                            <small>Form update profile anda sebagai pengguna</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('profile.update')}}" enctype="multipart/form-data" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <img src="{{ $data->foto != '-' ? asset('uploads/'.$data->foto) : asset('assets/images/user.png') }}"
                                        width="100" height="100" class="img" id="view_img" alt="User" />
                                      
                                        <div class="form-line">
                                            <br>
                                            <input type="file" accept="image/*,image/jpeg,image/png" name="foto" id="foto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" value="{{$data->name}}" class="form-control">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="username" name="username" value="{{$data->username}}" class="form-control">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" value="{{$data->email}}" class="form-control">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-15 d-flex">
                                <button type="submit" class="btn btn-primary form-confirm">Simpan</button>
                            </div>
                           
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('content-js')
<script>
    $('#foto').change(function(event) {
        $("#view_img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
    });
</script>
@endsection
