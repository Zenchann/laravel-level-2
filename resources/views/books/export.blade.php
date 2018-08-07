@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Penulis</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Data Penulis</div>
                <br>
                <center>
                    <p> <a class="btn btn-primary" href="{{ route('books.create') }}">Tambah</a>
                        <a class="btn btn-success" href="{{ url('/admin/export/books') }}">Export</a>
                    </p>
                </center> 
                <div class="card-body">
                  {!! Form::open(['url' => route('export.books.post'),'method' => 'post', 'class'=>'form-horizontal']) !!}
                        <div class="form-group {!! $errors->has('author_id') ? 'has-error' : '' !!}">
                        {!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('author_id[]', [''=>'']+App\Author::pluck('name','id')->all(),null, [
                                'class'=>'js-selectize','multiple','placeholder' => 'Pilih Penulis']) !!}
                                {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                            {!! Form::label('type', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!}
                            <div class="col-md-6 checkbox">
                                {{ Form::radio('type', 'xls', true) }} Excel
                                {{ Form::radio('type', 'pdf') }} PDF
                                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                {!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
