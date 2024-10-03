@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> Edit PMI</h1>
            <small> Edit Data PMI dengan mengisikan form disini !</small>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Biodata
                            <small>Biodata dari PMI akan muncul dibawah sini</small>
                        </h2>
                    </div>
                    <div class="body">
                        <center>
                            Biodata
                            <div class="image">
                                <img src="{{ $biodata->foto != '-' ? asset('uploads/' . $biodata->foto) : asset('assets/images/user.png') }}"
                                    width="100" height="100" class="img img-circle" alt="User" />
                            </div>
                            <br>
                            <span class="badge bg-green">{{ $biodata->kode_biodata }}</span>
                        </center>
                        <hr>
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tr>
                                    <td width="15%">Nama</td>
                                    <td>: {{ $biodata->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">TTL</td>
                                    <td>: {{ $biodata->tempat_lahir }},
                                        {{ date_format(date_create($biodata->tgl_lahir), 'd M Y') }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">L / P</td>
                                    <td>: {{ $biodata->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">Umur</td>
                                    <td>: {{ $biodata->umur }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">TB / BB</td>
                                    <td>: {{ $biodata->tb }} / {{ $biodata->bb }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">Agama</td>
                                    <td>: {{ $biodata->agama }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">Kewarganegaraan</td>
                                    <td>: {{ $biodata->kewarganegaraan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-8">
                            <h2>
                                Edit Data PMI
                                <small>Edit Data PMI pada form dibawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('pmi.index') }}" class="btn btn-danger btn-block" name="tambah"
                                id="tambah">Data PMI </a>
                        </div>
                    </div>
                    <div class="body">
                        <form action="{{ route('pmi.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <small>Isilah form di bawah ini dengan baik dan benar. jika tidak tersedia bisa di isi dengan tanda '-' (mines).</small>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('nik') error @enderror"">
                                            <input type="text" id="nik" name="nik" value="{{ isset($pmi) ? $pmi->nik : $biodata->nik }}"
                                                class="form-control" required>
                                            <label class="form-label">NIK</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('nama') error @enderror"">
                                            <input type="text" id="nama" name="nama" value="{{ isset($pmi) ? $pmi->nama : $biodata->nama }}"
                                                class="form-control" required>
                                            <label class="form-label">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('umur') error @enderror"">
                                            <input type="text" id="umur" name="umur" value="{{ isset($pmi) ? $pmi->umur : $biodata->umur }}"
                                                class="form-control" required>
                                            <label class="form-label">Umur</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jenis_kelamin') error @enderror">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control show-tick">
                                                <option value="L"
                                                    {{ isset($pmi) && $pmi->jenis_kelamin == 'L' || $biodata->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                    Laki Laki</option>
                                                <option value="P"
                                                    {{ isset($pmi) && $pmi->jenis_kelamin == 'P' || $biodata->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>   
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('asal') error @enderror"">
                                            <textarea type="text" id="asal" name="asal"
                                                class="form-control">{{ isset($pmi) ? $pmi->asal : $biodata->asal }}</textarea>
                                            <label class="form-label">Asal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('paspor') error @enderror"">
                                            <input type="text" id="paspor" name="paspor" value="{{ isset($pmi) ? $pmi->paspor : old('paspor') }}"
                                                class="form-control" required>
                                            <label class="form-label">Pasport</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('visa') error @enderror"">
                                            <input type="text" id="visa" name="visa" value="{{ isset($pmi) ? $pmi->visa : old('visa') }}"
                                                class="form-control" required>
                                            <label class="form-label">Visa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line  @error('pk_number') error @enderror"">
                                            <input type="text" id="pk_number" name="pk_number" value="{{ isset($pmi) ? $pmi->pk_number : old('pk_number') }}"
                                                class="form-control" required>
                                            <label class="form-label">Nomor PK</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small>Lengkapi dokumen dibawah ini dengan menginput file berbentuk PDF</small>
                                </div>
                                @foreach ($category_files as $item)
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        @if (isset($pmi))
                                            @foreach ($pmi->PMIFiles as $pf)
                                               {!!
                                                $pf->file_categories_id == $item->id ? '<a href="'.asset('uploads/'.$pf->file).'" class="btn btn-block btn-success" target="_blank">View Files</a>' : ''
                                                !!}
                                            @endforeach
                                        @endif
                                        <div class="form-line">
                                            
                                            <br>
                                            <input type="file" accept="application/pdf" name="pmi_files_{{$item->id}}"
                                                id="foto" class="form-control">
                                            <label class="form-label">{{$item->category_files}}</label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
