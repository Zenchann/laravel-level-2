@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Dashboard</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body primary">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-muted">Nama</td>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Login terakhir</td>
                                <td>{{ auth()->user()->last_login->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{ url('/settings/profile/edit') }}">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
