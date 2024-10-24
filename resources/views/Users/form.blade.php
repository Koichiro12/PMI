@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>{{ isset($data) ? 'Update' : 'Add' }} User</h1>
            <small>{{ isset($data) ? 'Update' : 'Add' }} Users by filling in the form here!</small>
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
                                {{ isset($data) ? 'Update' : 'Add' }} Users
                                <small>{{ isset($data) ? 'Update' : 'Add' }} User in the form below!</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('pengguna.index') }}" class="btn btn-danger btn-block">Users</a>
                        </div>

                    </div>
                    <div class="body">
                        <form action="{{ isset($data) ? route('pengguna.update', $data->id) : route('pengguna.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method(isset($data) ? 'PUT' : 'POST')
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <img src="{{ isset($data) && $data->foto != '-' ? asset('uploads/' . $data->foto) : asset('assets/images/user.png') }}"
                                            width="100" height="100" class="img" id="view_img" alt="User" />

                                        <div class="form-line">
                                            <br>
                                            <input type="file" accept="image/*,image/jpeg,image/png" name="foto"
                                                id="foto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name"
                                                value="{{ isset($data) ? $data->name : '' }}" class="form-control" required>
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="username" name="username"
                                                value="{{ isset($data) ? $data->username : '' }}" class="form-control" required>
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email"
                                                value="{{ isset($data) ? $data->email : '' }}" class="form-control" required>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" {{!isset($data) ? 'required' : ''}}>
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <p>
                                                Role
                                            </p>
                                            <select name="role" id="role" class="form-control show-tick">
                                                <option value="Administrator"
                                                    {{ isset($data) && $data == 'Administrator' ? 'selected' : '' }}>
                                                    Administrator</option>
                                                <option value="User"
                                                    {{ isset($data) && $data == 'User' ? 'selected' : '' }}>User</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-15 d-flex">
                                <button type="submit" class="btn btn-primary form-confirm">Save</button>
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
