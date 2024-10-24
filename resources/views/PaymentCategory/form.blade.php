@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> {{ isset($data) ? 'Update' : 'Add' }} Payment Category</h1>
            <small> {{ isset($data) ? 'Update' : 'Add' }} Payment Category Data by filling in the form here!</small>
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
                                {{ isset($data) ? 'Update' : 'Add' }} Payment Category
                                <small>{{ isset($data) ? 'Update' : 'Add' }} Payment Category Data in the form below!</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('category_payment.index') }}" class="btn btn-danger btn-block" name="tambah"
                                id="tambah">Payment Category </a>
                        </div>
                    </div>
                    <div class="body">
                        <form action="{{ isset($data) ? route('category_payment.update', $data->id) : route('category_payment.store') }}" method="POST">
                            @method(isset($data) ? 'PUT' : 'POST')
                            @csrf
                            <div class="row clearfix">
                               
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('payment_category') focused error @enderror">
                                            <input type="text" id="payment_category" name="payment_category"
                                                value="{{ isset($data) ? $data->payment_category : old('payment_category') }}" class="form-control">
                                            <label class="form-label">Payment Category</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('payment_category_status') error @enderror">
                                            <select name="payment_category_status" id="payment_category_status" class="form-control show-tick">
                                                <option value="1"
                                                    {{ isset($data) && $data->payment_category_status == '1' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ isset($data) && $data->payment_category_status == '0' ? 'selected' : '' }}>
                                                    Non Active</option>
                                            </select>
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

