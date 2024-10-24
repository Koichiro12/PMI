@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> {{ isset($data) ? 'Update' : 'Add' }} Selected Information</h1>
            <small> {{ isset($data) ? 'Update' : 'Add' }} Selected Information by filling in the form here!</small>
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
                                {{ isset($data) ? 'Update' : 'Add' }} Selected Information
                                <small>{{ isset($data) ? 'Update' : 'Add' }} Selected Information in the form below!</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('selected_information.index') }}" class="btn btn-danger btn-block"
                                name="tambah" id="tambah">All Data</a>
                        </div>
                    </div>
                    <div class="body">
                        <form
                            action="{{ isset($data) ? route('selected_information.update', $data->id) : route('selected_information.store') }}"
                            method="POST">
                            @method(isset($data) ? 'PUT' : 'POST')
                            @csrf
                            <div class="row clearfix">

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('job_order_no') focused error @enderror">
                                            <input type="text" id="job_order_no" name="job_order_no"
                                                value="{{ isset($data) ? $data->job_order_no : old('job_order_no') }}"
                                                class="form-control">
                                            <label class="form-label">Job Order No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nomor_paspor') focused error @enderror">
                                            <input type="text" id="nomor_paspor" name="nomor_paspor"
                                                value="{{ isset($data) ? $data->nomor_paspor : old('nomor_paspor') }}"
                                                class="form-control">
                                            <label class="form-label">Paspor</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nama_tionghoa') focused error @enderror">
                                            <input type="text" id="nama_tionghoa" name="nama_tionghoa"
                                                value="{{ isset($data) ? $data->nama_tionghoa : old('nama_tionghoa') }}"
                                                class="form-control">
                                            <label class="form-label">Chinese Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nama_inggris') focused error @enderror">
                                            <input type="text" id="nama_inggris" name="nama_inggris"
                                                value="{{ isset($data) ? $data->nama_inggris : old('nama_inggris') }}"
                                                class="form-control">
                                            <label class="form-label">English Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tma') focused error @enderror">
                                            <input type="text" id="tma" name="tma"
                                                value="{{ isset($data) ? $data->tma : old('tma') }}" class="form-control">
                                            <label class="form-label">TMA</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('pemberi_kerja') focused error @enderror">
                                            <input type="text" id="pemberi_kerja" name="pemberi_kerja"
                                                value="{{ isset($data) ? $data->pemberi_kerja : old('pemberi_kerja') }}"
                                                class="form-control">
                                            <label class="form-label">Employer</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('rekanan_perekrutan') focused error @enderror">
                                            <input type="text" id="rekanan_perekrutan" name="rekanan_perekrutan"
                                                value="{{ isset($data) ? $data->rekanan_perekrutan : old('rekanan_perekrutan') }}"
                                                class="form-control">
                                            <label class="form-label">Recruitment Colleague</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('progress_staff_asing') focused error @enderror">
                                            <input type="text" id="progress_staff_asing" name="progress_staff_asing"
                                                value="{{ isset($data) ? $data->progress_staff_asing : old('progress_staff_asing') }}"
                                                class="form-control">
                                            <label class="form-label">Foreign Staff Progress</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('staff_pemasaran') focused error @enderror">
                                            <input type="text" id="staff_pemasaran" name="staff_pemasaran"
                                                value="{{ isset($data) ? $data->staff_pemasaran : old('staff_pemasaran') }}"
                                                class="form-control">
                                            <label class="form-label">Marketing Staff</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('luar_negeri') focused error @enderror">
                                            <input type="text" id="luar_negeri" name="luar_negeri"
                                                value="{{ isset($data) ? $data->luar_negeri : old('luar_negeri') }}"
                                                class="form-control">
                                            <label class="form-label">Overseas</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kategori') focused error @enderror">
                                            <input type="text" id="kategori" name="kategori"
                                                value="{{ isset($data) ? $data->kategori : old('kategori') }}"
                                                class="form-control">
                                            <label class="form-label">Category</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kategori_pekerjaan') focused error @enderror">
                                            <input type="text" id="kategori_pekerjaan" name="kategori_pekerjaan"
                                                value="{{ isset($data) ? $data->kategori_pekerjaan : old('kategori_pekerjaan') }}"
                                                class="form-control">
                                            <label class="form-label">Work Category</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('sekolah') focused error @enderror">
                                            <input type="text" id="sekolah" name="sekolah"
                                                value="{{ isset($data) ? $data->sekolah : old('sekolah') }}"
                                                class="form-control">
                                            <label class="form-label">School</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nomor_referensi') focused error @enderror">
                                            <input type="text" id="nomor_referensi" name="nomor_referensi"
                                                value="{{ isset($data) ? $data->nomor_referensi : old('nomor_referensi') }}"
                                                class="form-control">
                                            <label class="form-label">Reference No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tanggal_terpilih_start') focused error @enderror">
                                            <input type="text" id="tanggal_terpilih_start"
                                                name="tanggal_terpilih_start"
                                                value="{{ isset($data) ? $data->tanggal_terpilih_start : old('tanggal_terpilih_start') }}"
                                                class="form-control">
                                            <label class="form-label">Date Selected (起)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tanggal_terpilih_end') focused error @enderror">
                                            <input type="text" id="tanggal_terpilih_end" name="tanggal_terpilih_end"
                                                value="{{ isset($data) ? $data->tanggal_terpilih_end : old('tanggal_terpilih_end') }}"
                                                class="form-control">
                                            <label class="form-label">Date Selected (终)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('penempatan_aktual_start') focused error @enderror">
                                            <input type="text" id="penempatan_aktual_start"
                                                name="penempatan_aktual_start"
                                                value="{{ isset($data) ? $data->penempatan_aktual_start : old('penempatan_aktual_start') }}"
                                                class="form-control">
                                            <label class="form-label">Actual Deployment (起)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('penempatan_aktual_end') focused error @enderror">
                                            <input type="text" id="penempatan_aktual_end" name="penempatan_aktual_end"
                                                value="{{ isset($data) ? $data->penempatan_aktual_end : old('penempatan_aktual_end') }}"
                                                class="form-control">
                                            <label class="form-label">Actual Deployment (终)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tgl_mulai') focused error @enderror">
                                            <input type="text" id="tgl_mulai" name="tgl_mulai"
                                                value="{{ isset($data) ? $data->tgl_mulai : old('tgl_mulai') }}"
                                                class="form-control">
                                            <label class="form-label">起</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tgl_selesai') focused error @enderror">
                                            <input type="text" id="tgl_selesai" name="tgl_selesai"
                                                value="{{ isset($data) ? $data->tgl_selesai : old('tgl_selesai') }}"
                                                class="form-control">
                                            <label class="form-label">终</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('nomor_seri') focused error @enderror">
                                            <input type="text" id="nomor_seri" name="nomor_seri"
                                                value="{{ isset($data) ? $data->nomor_seri : old('nomor_seri') }}"
                                                class="form-control">
                                            <label class="form-label">Serial Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('penempatan_aktual') focused error @enderror">
                                            <input type="text" id="penempatan_aktual" name="penempatan_aktual"
                                                value="{{ isset($data) ? $data->penempatan_aktual : old('penempatan_aktual') }}"
                                                class="form-control">
                                            <label class="form-label">Actual Deployment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('jenis_pekerjaan') focused error @enderror">
                                            <input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan"
                                                value="{{ isset($data) ? $data->jenis_pekerjaan : old('jenis_pekerjaan') }}"
                                                class="form-control">
                                            <label class="form-label">Work Type</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('diproses') error focused @enderror">
                                            <p>Status</p>
                                            <input type="checkbox" name="diproses" id="diproses"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->diproses == 'on' ? 'checked' : '' }}>
                                            <label for="diproses">Processed</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line @error('kembali') error focused @enderror">
                                            <input type="checkbox" name="kembali" id="kembali"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->kembali == 'on' ? 'checked' : '' }}>
                                            <label for="kembali">Back Out</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line @error('dibatalkan') error focused @enderror">
                                            <input type="checkbox" name="dibatalkan" id="dibatalkan"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->dibatalkan == 'on' ? 'checked' : '' }}>
                                            <label for="dibatalkan">Cancelled</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line @error('ditempatkan') error focused @enderror">
                                            <input type="checkbox" name="ditempatkan" id="ditempatkan"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->ditempatkan == 'on' ? 'checked' : '' }}>
                                            <label for="ditempatkan">Deployed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tampilkan_semua_progress') error focused @enderror">
                                            <p>Show All Progress</p>
                                            <input type="radio" value="1" name="tampilkan_semua_progress" id="tampilkan_semua_progress"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->tampilkan_semua_progress == '1' ? 'checked' : '' }}>
                                            <label for="tampilkan_semua_progress">Yes</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line @error('tampilkan_semua_progress') error focused @enderror">
                                            <input type="radio" value="0" name="tampilkan_semua_progress" id="tampilkan_semua_progress0"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->tampilkan_semua_progress == '0' ? 'checked' : '' }}>
                                            <label for="tampilkan_semua_progress0">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('prioritas_dan_ubah_backup_keprioritas') error focused @enderror">
                                            <p>Status</p>
                                            <input type="checkbox" name="prioritas_dan_ubah_backup_keprioritas" id="prioritas_dan_ubah_backup_keprioritas"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->prioritas_dan_ubah_backup_keprioritas == 'on' ? 'checked' : '' }}>
                                            <label for="prioritas_dan_ubah_backup_keprioritas">Priority and Change Backup to Priority</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line @error('cadangan') error focused @enderror">
                                            <input type="checkbox" name="cadangan" id="cadangan"
                                                class="filled-in chk-col-yellow"
                                                {{ isset($data) && $data->cadangan == 'on' ? 'checked' : '' }}>
                                            <label for="cadangan">Back Up</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" id="submit"
                                        class="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
