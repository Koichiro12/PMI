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
                    <form action="{{isset($data) ? route('biodata.update',$data->id) : route('biodata.create')}}">
                        @method(isset($data) ? 'PUT' : 'POST')
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-12">
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
                                        <input type="text" id="kode_biodata" name="kode_biodata" value="{{ isset($data) ? $data->kode_biodata : '' }}"
                                            class="form-control">
                                        <label class="form-label">Kode Biodata</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" value="{{ isset($data) ? $data->nama : '' }}"
                                            class="form-control">
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ isset($data) ? $data->tempat_lahir : '' }}"
                                            class="form-control">
                                        <label class="form-label">Tempat Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ isset($data) ? $data->tgl_lahir : '' }}"
                                            class="form-control">
                                        <label class="form-label">Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="umur" name="umur" value="{{ isset($data) ? $data->umur : '0' }}"
                                            class="form-control">
                                        <label class="form-label">Umur</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control show-tick">
                                            <option value="L"
                                                {{ isset($data) && $data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki Laki</option>
                                            <option value="P"
                                                {{ isset($data) && $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="tb" name="tb" value="{{ isset($data) ? $data->tb : '0' }}"
                                            class="form-control">
                                        <label class="form-label">Tinggi Badan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="bb" name="bb" value="{{ isset($data) ? $data->bb : '0' }}"
                                            class="form-control">
                                        <label class="form-label">Berat Badan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="agama" id="agama" class="form-control show-tick">
                                            <option value="Islam"
                                                {{ isset($data) && $data->agama == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                                <option value="Kristen"
                                                {{ isset($data) && $data->agama == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                                <option value="Katholik"
                                                {{ isset($data) && $data->agama == 'Katholik' ? 'selected' : '' }}>
                                                Katholik</option>
                                                <option value="Hindu"
                                                {{ isset($data) && $data->agama == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                                <option value="Budha"
                                                {{ isset($data) && $data->agama == 'Budha' ? 'selected' : '' }}>
                                                Budha</option>
                                                <option value="Konghucu"
                                                {{ isset($data) && $data->agama == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="kewarganegaraan" name="kewarganegaraan" value="{{ isset($data) ? $data->kewarganegaraan : '' }}"
                                            class="form-control">
                                        <label class="form-label">kewarganegaraan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="pendidikan" name="pendidikan" value="{{ isset($data) ? $data->pendidikan : '' }}"
                                            class="form-control">
                                        <label class="form-label">Pendidikan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="bahasa" name="bahasa" value="{{ isset($data) ? $data->bahasa : '' }}"
                                            class="form-control">
                                        <label class="form-label">Bahasa</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection
@section('content-js')
    <script type="text/javascript">
     $('#foto').change(function(event) {
            $("#view_img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
        });
    </script>
@endsection

