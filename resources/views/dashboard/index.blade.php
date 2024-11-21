@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <!-- Total Cards -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">
                                <a href="{{ route('magang.index') }}" class="text-white text-decoration-none">Total Magang</a>
                            </h5>
                            <p class="card-text display-6">{{ $totalMagang }}</p>
                        </div>
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">
                                <a href="{{ route('institusi.index') }}" class="text-white text-decoration-none">Total Institusi</a>
                            </h5>
                            <p class="card-text display-6">{{ $totalInstitusi }}</p>
                        </div>
                        <i class="fas fa-building fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">
                                <a href="{{ route('divisi.index') }}" class="text-white text-decoration-none">Total Divisi</a>
                            </h5>
                            <p class="card-text display-6">{{ $totalDivisi }}</p>
                        </div>
                        <i class="fas fa-briefcase fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Grafik Magang per Bulan (Line Chart) -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Jumlah Magang per Bulan</h5>
                </div>
                <div class="card-body">
                    <canvas id="magangChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Status Magang Pie Chart -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Status Magang</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Line Chart - Magang per Bulan
    const ctx1 = document.getElementById('magangChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Jumlah Magang',
                data: @json($chartData['data']),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true, // to create the filled effect
                tension: 0.4 // for curved lines
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    min: 1,
                    max: 10,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Doughnut Chart - Status Magang
    const ctx2 = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: @json($statusMagang->pluck('status')->toArray()),
            datasets: [{
                data: @json($statusMagang->pluck('total')->toArray()),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)' // Add more colors if necessary
                ]
            }]
        },
        options: {
            responsive: true,
            cutout: '70%', // Atur ukuran bagian tengah agar lingkaran lebih tipis (70% dari radius total)
        plugins: {
            legend: {
                display: true // Tampilkan legenda jika diperlukan
            }
        }
        }
    });
});
</script>
@endpush
