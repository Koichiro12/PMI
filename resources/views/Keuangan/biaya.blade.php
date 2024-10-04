@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h1>Set Biaya</h1>
            <small>Set biaya dengan mengisi form di bawah ini !</small>
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
                                Set Biaya
                                <small>Form biaya ada di bawah ini !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('keuangan.index')}}" class="btn btn-sm btn-danger btn-block">Data Keuangan</a>
                        </div>

                    </div>
                    <div class="body">
                        <form action="{{route('keuangan.setbiaya',$id)}}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="biodata_id" id="bidata_id" value="{{$id}}">
                            <div class="table-responsive">
                                <table class="table" id="tbl_list">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Biaya</th>
                                            <th>Set Biaya</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    @foreach ($paymentCategory as $item)
                                        @php
                                                $val = 0;
                                                $note = '';
                                            foreach($paymentAmount as $pa){
                                                if($pa->payment_categories_id == $item->id){
                                                    $val = $pa->amount;
                                                    $note = $pa->note;
                                                    
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$item->payment_category}}</td>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" id="category_amount_{{$item->id}}" name="category_amount_{{$item->id}}" value="{{$val}}"
                                                                class="form-control" placeholder="{{$item->payment_category}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <textarea name="category_note_{{$item->id}}" id="category_note_{{$item->id}}" class="form-control" cols="30" rows="2" placeholder="Note {{$item->payment_category}}">{{$note}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

