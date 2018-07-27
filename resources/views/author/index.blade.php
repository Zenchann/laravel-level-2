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
                <center><p> <a class="btn btn-primary" href="{{ route('authors.create') }}">Tambah</a> </p>
                </center> <div class="card-body">
                   {!! $html->table(['class'=>'table table-striped']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection
