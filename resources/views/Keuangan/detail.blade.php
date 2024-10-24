@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Detail Payment</h1>
            <small>Payment details will appear below!</small>
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
                                <small>Biodata details below!</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('keuangan.index') }}" class="btn btn-sm btn-danger btn-block">
                                Payment</a>
                        </div>

                    </div>
                    <div class="body">
                        <div class="row clear-fix">
                            <div class="col-md-6 text-center">
                                <small>Image</small>
                                <br>
                                <img src="{{ $biodata->foto != '-' ? asset('uploads/' . $biodata->foto) : asset('assets/images/user.png') }}"
                                    width="80%"class="img" id="view_img" alt="User" />

                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td width="15%">Code</td>
                                            <td>: {{ $biodata->kode_biodata }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Name</td>
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
                                            <td width="15%">Age</td>
                                            <td>: {{ $biodata->umur }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">TB / BB</td>
                                            <td>: {{ $biodata->tb }} / {{ $biodata->bb }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Religion</td>
                                            <td>: {{ $biodata->agama }}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Citizenship</td>
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
                                Cost
                                <small>Cost details below!</small>
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th width="10%">No</th>
                                    <th>Cost</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>underpayment</th>
                                </thead>
                                <tbody>
                                    @foreach ($biodata->PaymentAmount as $item)
                                        @php
                                            $biaya = 0;
                                            $terbayar = 0;
                                            foreach ($biodata->Payment as $p) {
                                                if ($p->payment_categories_id == $item->payment_categories_id) {
                                                    if ($p->payment_status == '1') {
                                                        $terbayar += $p->payment;
                                                    }
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->PaymentCategory->payment_category }}</td>
                                            <td>Rp.{{ number_format($item->amount) }},-</td>
                                            <td>Rp.{{ number_format($terbayar) }},-</td>
                                            <td>Rp.{{ number_format(abs($terbayar - $item->amount)) }},-</td>
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
                                Payment
                                <small>Payment Details below!</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-sm btn-primary btn-block" data-toggle="modal"
                                data-target="#modalTambah">Add</a>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table" id="tbl_list">
                                <thead>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Cost</th>
                                    <th>Paid</th>
                                    <th>Note / Proof</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">Add Payment</h4>
                        <small>Add payment via the form here!</small>
                    </div>
                    <form action="{{ route('keuangan_detail.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="biodata_id" id="biodata_id" value="{{ $id }}">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('payment_categories_id') error focused @enderror"">
                                            <p>
                                                Category Payment
                                            </p>
                                            <select name="payment_categories_id" id="payment_categories_id"
                                                class="form-control show-tick">
                                                <option value="">-- Choose Category Payment --</option>
                                                @foreach ($biodata->PaymentAmount as $item)
                                                    @php
                                                        $biaya = 0;
                                                        $terbayar = 0;
                                                        foreach ($biodata->Payment as $p) {
                                                            if (
                                                                $p->payment_categories_id ==
                                                                $item->payment_categories_id
                                                            ) {
                                                                if ($p->payment_status == '1') {
                                                                    $terbayar += $p->payment;
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    <option value="{{ $item->payment_categories_id }}"
                                                        {{ $terbayar >= $item->amount ? 'disabled' : '' }}>
                                                        {{ $item->PaymentCategory->payment_category }} (
                                                        Rp.{{ number_format($item->amount - $terbayar) }} )</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('type_payment') error focused @enderror"">
                                            <p>
                                                Type
                                            </p>
                                            <select name="type_payment" id="type_payment" class="form-control show-tick">
                                                <option value="Cash"
                                                    {{ old('type_payment') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                                <option value="Transfer"
                                                    {{ old('type_payment') == 'Transfer' ? 'selected' : '' }}>Transfer
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error('payment') error focused @enderror">
                                        <input type="number" id="payment" value="{{ old('payment') }}"
                                            name="payment"class="form-control" required>
                                        <label class="form-label">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error('bukti') error focused @enderror">
                                        <small>
                                            Proof of payment <b>* Optional</b>
                                        </small>
                                        <input type="file" id="buktis" accept="image/*,image/png,image/jpeg,image/jpg"
                                            name="buktis"class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error('note') error focused @enderror">
                                        <textarea id="note" name="note"class="form-control">{{ old('note') }}</textarea>
                                        <label class="form-label">Note</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error('payment_status') error focused @enderror"">
                                        <p>
                                            Status
                                        </p>
                                        <select name="payment_status" id="payment_status" class="form-control show-tick">
                                            <option value="0" {{ old('payment_status') == '0' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="1" {{ old('payment_status') == '1' ? 'selected' : '' }}>
                                                Success</option>
                                            <option value="2" {{ old('payment_status') == '2' ? 'selected' : '' }}>
                                                Fail / Cancel</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-link waves-effect">SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>

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
                ajax: '{{ route('keuangan_detail.payment', $id) }}',
                columns: [{
                        data: "id",
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'type_payment',
                        name: 'type_payment'
                    },
                    {
                        data: 'biaya',
                        name: 'biaya'
                    },
                    {
                        data: 'bayar',
                        name: 'bayar'
                    },
                    {
                        data: 'note_or_bukti',
                        name: 'note_or_bukti'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                    },
                ]
            });
        });
    </script>
@endsection
