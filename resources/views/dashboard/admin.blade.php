@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body primary">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.
                    <hr>
                    <h4>Statistik Penulis</h4>
                    <canvas id="chartPenulis" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/Chart.min.js"></script>
<script>
var data = {
labels: {!! json_encode($authors) !!},
datasets: [{
        label: 'Jumlah buku',
        data: {!! json_encode($books) !!},
        backgroundColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        borderColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
    }]
};
var options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true,
                stepSize: 1,
            }
        }]
    },
    title: {
        display: true,
        text: 'Data Penulis dan jumlah buku'
      }
};
var ctx = document.getElementById("chartPenulis").getContext("2d");
var authorChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});
</script>
@endsection
