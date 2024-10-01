@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> {{ isset($data) ? 'Edit' : 'Tambah' }} Biodata</h1>
            <small> {{ isset($data) ? 'Edit' : 'Tambah' }} Data Biodata dengan mengisikan form disini !</small>
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
                                {{ isset($data) ? 'Edit' : 'Tambah' }} Data Biodata
                                <small>{{ isset($data) ? 'Edit' : 'Tambah' }} Data biodata pada form dibawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('biodata.index') }}" class="btn btn-danger btn-block" name="tambah"
                                id="tambah">Data Biodata</a>
                        </div>
                    </div>
                    <div class="body">
                        <form action="{{ isset($data) ? route('biodata.update', $data->id) : route('biodata.store') }}" method="POST">
                            @method(isset($data) ? 'PUT' : 'POST')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <small>Data Diri</small>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <img src="{{ isset($data) && $data->foto != '-' ? asset('uploads/' . $data->foto) : asset('assets/images/user.png') }}"
                                            width="100" height="100" class="img" id="view_img" alt="User" />
                                        <div class="form-line">
                                            <br>
                                            <input type="file" accept="image/*,image/jpeg,image/png" name="foto-biodata"
                                                id="foto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kode_biodata') error @enderror">
                                            <input type="text" id="kode_biodata" name="kode_biodata"
                                                value="{{ isset($data) ? $data->kode_biodata : old('kode_biodata') }}" class="form-control">
                                            <label class="form-label">Kode Biodata</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nama') error @enderror">
                                            <input type="text" id="name" name="nama"
                                                value="{{ isset($data) ? $data->nama : old('nama') }}" class="form-control">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tempat_lahir') error @enderror">
                                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                                value="{{ isset($data) ? $data->tempat_lahir : old('tempat_lahir') }}" class="form-control">
                                            <label class="form-label">Tempat Lahir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tgl_lahir') error @enderror">
                                            <input type="date" id="tgl_lahir" name="tgl_lahir"
                                                value="{{ isset($data) ? $data->tgl_lahir : old('tgl_lahir') }}"
                                                class="form-control">
                                            <label class="form-label">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('umur') error @enderror">
                                            <input type="number" id="umur" name="umur"
                                                value="{{ isset($data) ? $data->umur : old('umur') }}" class="form-control">
                                            <label class="form-label">Umur</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jenis_kelamin') error @enderror">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control show-tick">
                                                <option value="L"
                                                    {{ isset($data) && $data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                    Laki Laki</option>
                                                <option value="P"
                                                    {{ isset($data) && $data->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tb') error @enderror">
                                            <input type="number" id="tb" name="tb"
                                                value="{{ isset($data) ? $data->tb : old('tb') }}" class="form-control">
                                            <label class="form-label">Tinggi Badan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('bb') error @enderror">
                                            <input type="number" id="bb" name="bb"
                                                value="{{ isset($data) ? $data->bb : old('bb') }}" class="form-control">
                                            <label class="form-label">Berat Badan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('agama') error @enderror">
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
                                        <div class="form-line @error('kewarganegaraan') error @enderror">
                                            <input type="text" id="kewarganegaraan" name="kewarganegaraan"
                                                value="{{ isset($data) ? $data->kewarganegaraan : old('kewarganegaraan') }}"
                                                class="form-control">
                                            <label class="form-label">kewarganegaraan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('pendidikan') error @enderror">
                                            <input type="text" id="pendidikan" name="pendidikan"
                                                value="{{ isset($data) ? $data->pendidikan : old('pendidikan') }}" class="form-control">
                                            <label class="form-label">Pendidikan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('bahasa') error @enderror">
                                            <input type="text" id="bahasa" name="bahasa"
                                                value="{{ isset($data) ? $data->bahasa : old('bahasa') }}" class="form-control">
                                            <label class="form-label">Bahasa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small>Anggota Keluarga</small>
                                    <hr>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('status_ayah') error @enderror">
                                            <input type="checkbox" name="status_ayah" id="status_ayah"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->status_ayah == '1' ? 'checked' : '' }}>
                                            <label for="status_ayah">Ayah</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('umur_ayah') error @enderror">
                                            <input type="number" id="umur_ayah" name="umur_ayah"
                                                value="{{ isset($data) ? $data->umur_ayah : old('umur_ayah') }}" class="form-control">
                                            <label class="form-label">Umur Ayah</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('status_ibu') error @enderror">
                                            <input type="checkbox" name="status_ibu" id="status_ibu"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->status_ibu == '1' ? 'checked' : '' }}>
                                            <label for="status_ibu">Ibu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('umur_ibu') error @enderror">
                                            <input type="number" id="umur_ibu" name="umur_ibu"
                                                value="{{ isset($data) ? $data->umur_ibu : old('umur_ibu') }}" class="form-control">
                                            <label class="form-label">Umur Ibu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('anak_ke') error @enderror">
                                            <input type="number" id="anak_ke" name="anak_ke"
                                                value="{{ isset($data) ? $data->anak_ke : old('anak_ke') }}" class="form-control">
                                            <label class="form-label">Anak ke</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jumlah_saudara') error @enderror">
                                            <input type="number" id="jumlah_saudara" name="jumlah_saudara"
                                                value="{{ isset($data) ? $data->jumlah_saudara : old('jumlah_saudara') }}"
                                                class="form-control">
                                            <label class="form-label">Jumlah Saudara</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kakak_laki_laki') error @enderror">
                                            <input type="number" id="kakak_laki_laki" name="jumlah_saudara"
                                                value="{{ isset($data) ? $data->kakak_laki_laki : old('kakak_laki_laki') }}"
                                                class="form-control">
                                            <label class="form-label">Kakak Laki Laki</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kakak_perempuan') error @enderror">
                                            <input type="number" id="kakak_perempuan" name="kakak_perempuan"
                                                value="{{ isset($data) ? $data->kakak_perempuan : old('kakak_perempuan') }}"
                                                class="form-control">
                                            <label class="form-label">Kakak Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('adik_laki_laki') error @enderror">
                                            <input type="number" id="adik_laki_laki" name="adik_laki_laki"
                                                value="{{ isset($data) ? $data->adik_laki_laki : old('adik_laki_laki') }}"
                                                class="form-control">
                                            <label class="form-label">Adik Laki Laki</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('adik_perempuan') error @enderror">
                                            <input type="number" id="adik_perempuan" name="adik_perempuan"
                                                value="{{ isset($data) ? $data->adik_perempuan : old('adik_perempuan') }}"
                                                class="form-control">
                                            <label class="form-label">Adik Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('status_pernikahan') error @enderror">
                                            <input type="text" id="status_pernikahan" name="status_pernikahan"
                                                value="{{ isset($data) ? $data->status_pernikahan : old('status_pernikahan') }}"
                                                class="form-control">
                                            <label class="form-label">Status Pernikahan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nama_suami') error @enderror">
                                            <input type="text" id="nama_suami" name="nama_suami"
                                                value="{{ isset($data) ? $data->nama_suami : old('nama_suami') }}" class="form-control">
                                            <label class="form-label">Nama Suami</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('karir_suami') error @enderror">
                                            <input type="text" id="karir_suami" name="karir_suami"
                                                value="{{ isset($data) ? $data->karir_suami : old('karir_suami') }}"
                                                class="form-control">
                                            <label class="form-label">Karir Suami</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jml_anak') error @enderror">
                                            <input type="number" id="jml_anak" name="jml_anak"
                                                value="{{ isset($data) ? $data->jml_anak : old('jml_anak') }}" class="form-control">
                                            <label class="form-label">Jumlah Anak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jml_anak_laki_laki') error @enderror">
                                            <input type="number" id="jml_anak_laki_laki" name="jml_anak_laki_laki"
                                                value="{{ isset($data) ? $data->jml_anak_laki_laki : old('jml_anak_laki_laki') }}"
                                                class="form-control">
                                            <label class="form-label">Anak Laki Laki</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('umur_anak_laki_laki') error @enderror">
                                            <input type="text" id="umur_anak_laki_laki" name="umur_anak_laki_laki"
                                                value="{{ isset($data) ? $data->umur_anak_laki_laki : old('umur_anak_laki_laki') }}"
                                                class="form-control">
                                            <label class="form-label">Umur Anak Laki Laki</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jml_anak_perempuan') error @enderror">
                                            <input type="number" id="jml_anak_perempuan" name="jml_anak_perempuan"
                                                value="{{ isset($data) ? $data->jml_anak_perempuan : old('jml_anak_perempuan') }}"
                                                class="form-control">
                                            <label class="form-label">Anak Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('umur_anak_perempuan') error @enderror">
                                            <input type="text" id="umur_anak_perempuan" name="umur_anak_perempuan"
                                                value="{{ isset($data) ? $data->umur_anak_perempuan : old('umur_anak_perempuan') }}"
                                                class="form-control">
                                            <label class="form-label">Umur Anak Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small>Relasi dan Pengalaman Kerja</small>
                                    <hr>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('family_in_taiwan') error @enderror">
                                            <input type="checkbox" name="family_in_taiwan" id="family_in_taiwan"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->family_in_taiwan == '1' ? 'checked' : '' }}>
                                            <label for="family_in_taiwan">Apakah ada saudara atau teman di Taiwan ?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button"
                                        class="btn btn-primary btn-block btn-tambah-fit">Tambah</button>
                                </div>
                                <div class="fit_container">
                                    @if (isset($data) && $data->BiodataFamilyOverseas()->count() > 0)
                                        @foreach ($data->BiodataFamilyOverseas as $fit)
                                            <div class="fit">
                                                <div class="col-sm-3">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" placeholder="Name"
                                                                value="{{ $fit->name }}" name="fit_name[]"
                                                                class="form-control" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" placeholder="Hubungan"
                                                                value="{{ $fit->relasi }}" name="fit_relation[]"
                                                                class="form-control" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" placeholder="Lokasi"
                                                                value="{{ $fit->lokasi }}" name="fit_location[]"
                                                                class="form-control" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-danger btn-delete btn-block">Hapus</button>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="col-sm-12">
                                    <h6>Pengalaman Kerja</h6>
                                </div>
                                <div class="col-md-10">
                                    <small>Domestic</small>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button"
                                        class="btn btn-primary btn-block btn-tambah-domestic">Tambah</button>
                                </div>
                                <div class="domestic_container">
                                    @if (isset($data) && $data->BiodataExperiences()->count() > 0)
                                        @foreach ($data->BiodataExperiences as $bed)
                                            @if ($bed->type_pekerjaan == 'domestic')
                                                <div class="domestic">
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="domestic_masa_kerja[]"
                                                                    value="{{ $bed->masa_kerja }}"
                                                                    name="domestic_masa_kerja[]"class="form-control"
                                                                    placeholder="Masa Kerja" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="domestic_wilayah_kerja[]"
                                                                    value="{{ $bed->wilayah_kerja }}"
                                                                    name="domestic_wilayah_kerja[]"class="form-control"
                                                                    placeholder="Wilayah Kerja" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="domestic_desc_kerja[]"
                                                                    value="{{ $bed->desc_pekerjaan }}"
                                                                    name="domestic_desc_kerja[]"class="form-control"
                                                                    placeholder="Deskripsi Pekerjaan" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2"><button type="button"
                                                            class="btn btn-danger btn-delete-domestic btn-block">Hapus</button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <small>Overseas</small>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button"
                                        class="btn btn-primary btn-block btn-tambah-overseas">Tambah</button>
                                </div>
                                <div class="overseas_container">
                                    @if (isset($data) && $data->BiodataExperiences()->count() > 0)
                                        @foreach ($data->BiodataExperiences as $bed)
                                            @if ($bed->type_pekerjaan == 'overseas')
                                                <div class="overseas">
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="overseas_masa_kerja[]"
                                                                    value="{{ $bed->masa_kerja }}"
                                                                    name="overseas_masa_kerja[]"class="form-control"
                                                                    placeholder="Masa Kerja" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="overseas_wilayah_kerja[]"
                                                                    value="{{ $bed->wilayah_kerja }}"
                                                                    name="overseas_wilayah_kerja[]"class="form-control"
                                                                    placeholder="Wilayah Kerja" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group form-float">
                                                            <div class="form-line"><input type="text"
                                                                    id="overseas_desc_kerja[]"
                                                                    value="{{ $bed->desc_pekerjaan }}"
                                                                    name="overseas_desc_kerja[]"class="form-control"
                                                                    placeholder="Deskripsi Pekerjaan" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2"><button type="button"
                                                            class="btn btn-danger btn-delete-overseas btn-block">Hapus</button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" id="submit"
                                        class="submit">Simpan</button>
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
        $(document).on('ready', function() {

            //Family In Taiwan :)
            $(document).on('click', '.btn-tambah-fit', function(e) {
                e.preventDefault()
                let html =
                    '<div class="fit"><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text"  name="fit_name[]" placeholder="Name" class="form-control" required> </div></div></div><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text" name="fit_relation[]" placeholder="Hubungan" class="form-control" required></div></div></div><div class="col-sm-4"><div class="form-group form-float"><div class="form-line"><input type="text"  name="fit_location[]" placeholder="Lokasi" class="form-control" required></div></div></div><div class="col-sm-2"> <button type="button" class="btn btn-danger btn-delete btn-block" >Hapus</button></div></div>';
                $('.fit_container').append(html);
            })

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                $(this).parent().closest('.fit').remove();
            });

            //Domestic
            $(document).on('click', '.btn-tambah-domestic', function(e) {
                e.preventDefault()
                let html =
                    '<div class="domestic"><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text" id="domestic_masa_kerja[]" name="domestic_masa_kerja[]"class="form-control" placeholder="Masa Kerja" required></div></div></div><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text" id="domestic_wilayah_kerja[]" name="domestic_wilayah_kerja[]"class="form-control" placeholder="Wilayah Kerja" required></div></div></div><div class="col-sm-4"><div class="form-group form-float"><div class="form-line"><input type="text" id="domestic_desc_kerja[]" name="domestic_desc_kerja[]"class="form-control" placeholder="Deskripsi Pekerjaan" required></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger btn-delete-domestic btn-block">Hapus</button></div></div>';
                $('.domestic_container').append(html);
            })

            $(document).on('click', '.btn-delete-domestic', function(e) {
                e.preventDefault();
                $(this).parent().closest('.domestic').remove();
            });
            //Overseas
            $(document).on('click', '.btn-tambah-overseas', function(e) {
                e.preventDefault()
                let html =
                    '<div class="overseas"><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text" id="overseas_masa_kerja[]" name="overseas_masa_kerja[]"class="form-control" placeholder="Masa Kerja" required></div></div></div><div class="col-sm-3"><div class="form-group form-float"><div class="form-line"><input type="text" id="overseas_wilayah_kerja[]" name="overseas_wilayah_kerja[]"class="form-control" placeholder="Wilayah Kerja" required></div></div></div><div class="col-sm-4"><div class="form-group form-float"><div class="form-line"><input type="text" id="overseas_desc_kerja[]" name="overseas_desc_kerja[]"class="form-control" placeholder="Deskripsi Pekerjaan" required></div></div></div><div class="col-sm-2"><button type="button" class="btn btn-danger btn-delete-overseas btn-block">Hapus</button></div></div>';
                $('.overseas_container').append(html);
            })

            $(document).on('click', '.btn-delete-overseas', function(e) {
                e.preventDefault();
                $(this).parent().closest('.overseas').remove();
            });
        });
    </script>
@endsection
