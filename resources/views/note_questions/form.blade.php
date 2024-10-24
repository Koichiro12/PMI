@extends('assets.layouts.dashboard')
@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div class="block-header">
            <h1> {{ isset($data) ? 'Update' : 'Add' }} Note Questions</h1>
            <small> {{ isset($data) ? 'Update' : 'Add' }} Data Note Questions by filling in the form here !</small>
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
                                {{ isset($data) ? 'Update' : 'Add' }} Data Note Questions
                                <small>{{ isset($data) ? 'Update' : 'Add' }} Data Note Questions in the form below
                                    !</small>
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('questions.index') }}" class="btn btn-danger btn-block" name="tambah"
                                id="tambah">Data Note Questions</a>
                        </div>
                    </div>
                    <div class="body">
                        <form action="{{ isset($data) ? route('questions.update', $data->id) : route('questions.store') }}"
                            method="POST">
                            @method(isset($data) ? 'PUT' : 'POST')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('type_question') error @enderror">
                                            <select name="type_question" id="type_question" class="form-control show-tick">
                                                <option value="0"
                                                    {{ isset($data) && $data->type_question == '0' ? 'selected' : '' }}>
                                                    Multiple Choice</option>
                                                <option value="1"
                                                    {{ isset($data) && $data->type_question == '1' ? 'selected' : '' }}>
                                                    Essay
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line @error('question') error focused @enderror">
                                            <textarea id="question" name="question"class="form-control">{{ isset($data) ? $data->question : old('question') }}</textarea>
                                            <label class="form-label">Question</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="option-container">
                                    <div class="col-md-10"><small>Option</small></div>
                                    <div class="col-sm-2"><button
                                            type="button"class="btn btn-primary btn-block btn-tambah-option">Add</button>
                                    </div>
                                    <div class="options">
                                        @if (isset($data) && $data->Options()->count() > 0)
                                            @foreach ($data->Options as $bed)
                                                <div class="option">
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line"><input id="option[]" name="option[]"
                                                                        class="form-control" type="text"
                                                                        value="{{$bed->option_text}}"
                                                                        placeholder="Option" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2"><button
                                                            type="button"class="btn btn-danger btn-delete-option btn-block">Delete</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
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
@section('content-js')
    <script type="text/javascript">
        $(document).on('ready', function() {
            var vals = $('#type_question').val()
            
                if (vals == '1') {
                    $('.option-container').html("");
                }
            $('#type_question').on("change", function() {
                var val = this.value
                if (val == '0') {
                    $('.option-container').html(
                        '<div class="col-md-10"><small>Option</small></div><div class="col-sm-2"><button type="button"class="btn btn-primary btn-block btn-tambah-option">Add</button></div><div class="options"></div>'
                    );
                }
                if (val == '1') {
                    $('.option-container').html("");
                }
            });
            $(document).on('click', '.btn-tambah-option', function(e) {
                $('.options').append(
                    '<div class="option"><div class="col-sm-10"><div class="col-sm-12"><div class="form-group form-float"><div class="form-line"><input id="option[]" name="option[]" class="form-control" type="text" placeholder="Option"/></div></div></div></div><div class="col-sm-2"><button type="button"class="btn btn-danger btn-delete-option btn-block">Delete</button></div></div>'
                )
            });
            $(document).on('click', '.btn-delete-option', function(e) {
                e.preventDefault();
                $(this).parent().closest('.option').remove();
            });
        })
    </script>
@endsection
