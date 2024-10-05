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
                        <div class="col-md-10">
                            <h2>
                                Detail Biodata
                                <small>Detail Biodata di bawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('keuangan.index')}}" class="btn btn-sm btn-danger btn-block">Data Keuangan</a>
                        </div>

                    </div>
                    <div class="body">
                        <div class="row clear-fix">
                            <div class="col-md-6 text-center">
                                <small>Foto</small>
                                <br>
                                <img src="{{ $biodata->foto != '-' ? asset('uploads/' . $biodata->foto) : asset('assets/images/user.png') }}"
                                width="80%"class="img" id="view_img" alt="User" />

                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td width="15%">Kode</td>
                                            <td>: {{$biodata->kode_biodata}}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Nama</td>
                                            <td>: {{$biodata->nama}}</td>
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
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-10">
                            <h2>
                                Biaya
                                <small>Detail Biaya di bawah ini !</small>
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th width="10%">No</th>
                                <th>Biaya</th>
                                <th>Total Bayar</th>
                                <th>Terbayar</th>
                                <th>Kurang</th>
                            </thead>
                            <tbody>
                               @foreach ($paymentCategory as $item)
                                        @php
                                            $biaya = 0;
                                            $terbayar = 0;
                                            foreach($biodata->PaymentAmount as $pa){
                                                if($pa->payment_categories_id == $item->id){
                                                    $biaya = $pa->amount;
                                                }
                                            }
                                            foreach($biodata->Payment as $p){
                                                if($p->payment_categories_id == $item->id){
                                                    $terbayar += $p->payment;
                                                }
                                            }
                                        @endphp
                                   <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->payment_category}}</td>
                                    <td>Rp.{{number_format($biaya)}},-</td>
                                    <td>Rp.{{number_format($terbayar)}},-</td>
                                    <td>Rp.{{number_format($terbayar - $biaya)}},-</td>
                                   </tr>
                               @endforeach
                               
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-md-10">
                            <h2>
                                Pembayaran
                                <small>Detail Pembayaran di bawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#modalTambah">Tambah</a>
                        </div>
                    </div>
                    <div class="body">
                      <div class="table-responsive">
                        <table class="table" id="tbl_list">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Type Bayar</th>
                                <th>Biaya</th>
                                <th>Total Bayar</th>
                                <th>Note / Bukti</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('content-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('keuangan_detail.payment',$id) }}',
                columns: [{
                        data: "id",
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data : 'tanggal',
                        name : 'tanggal'
                    },
                    {
                        data : 'type_payment',
                        name : 'type_payment'
                    },
                    {
                        data : 'biaya',
                        name : 'biaya'
                    },
                    {
                        data : 'bayar',
                        name : 'bayar'
                    },
                    {
                        data : 'note_or_bukti',
                        name : 'note_or_bukti'
                    },
                    {
                        data : 'status',
                        name : 'status'
                    },
                    {
                        data: "id",
                        name: "id",
                        render: function(data, type, row, meta) {
                            let id = data;
                            return '<a href="{!! url()->current() !!}" class="btn btn-primary btn-block m-2" name="print_pdf" id="print_pdf" >Detail </a>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
