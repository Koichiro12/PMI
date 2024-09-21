@extends('assets.Layouts.auth')
@section('content')

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="#">Admin Panel <b>P3MI</b></a>
                <small>PT. AIDA DUTA INDONESIA SEJAHTERA</small>
            </div>
            <div class="card">
                <div class="body">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form id="sign_in" action="{{ route('auth') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="msg">Masukan username dan password disini !</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('username') }}" name="username"
                                    placeholder="Username" required autofocus>
                            </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xs-12 p-t-5 captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn bg-red " class="reload" id="reload-captcha">
                                    &#x21bb;
                                </button>

                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">key</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="captcha" id="catpcha" class="form-control"
                                    placeholder="Captcha" required>
                            </div>
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-yellow">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-yellow waves-effect" type="submit">Sign In</button>
                            </div>
                        </div>
                        {{-- <div class="row m-t-15 m-b--20 ">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> --}}
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('content-js')
        <script>
            $('#reload-captcha').click(function() {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function(data) {
                        $(".captcha span").html(data.captcha);
                        console.log(data.captcha);
                    }
                });
            });
        </script>
    @endsection
