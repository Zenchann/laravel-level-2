@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('books.index') }}">Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Tambah Data Penulis</div>
                <br>
               <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Form</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload</a>
                        </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                {!! Form::open(['url' => route('books.store'),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                                    @include('books._form')
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                {!! Form::open(['url' => route('import.books'),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                                    @include('books._import')
                                {!! Form::close() !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

