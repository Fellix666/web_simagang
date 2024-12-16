@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css">
@endsection

@section('content')
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --warning-color: #f39c12;
        --background-light: #f4f6f9;
        --text-dark: #2c3e50;
        --card-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    body {
        background-color: var(--background-light);
        color: var(--text-dark);
        font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
    }

    .dashboard-container {
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        padding: 40px;
        margin: 30px;
        transition: all 0.3s ease;
        width: calc(100% - 30px);
        max-width: none;
    }

    .dashboard-container:hover {
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .card {
        background-color: white;
        border: none;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: none;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-weight: 600;
        margin-bottom: 0;
    }

    .chart-container {
        position: relative;
        height: 400px;
        padding: 15px;
    }

    .total-card-icon {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .card:hover .total-card-icon {
        opacity: 1;
    }

    #chart-type {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        padding: 5px 15px;
    }

    .additional-info {
        background: linear-gradient(135deg, #f6f8f9 0%, #f1f3f5 100%);
        border-radius: 15px;
        padding: 20px;
    }
</style>

<div class="container-fluid d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <div class="dashboard-container">
        <!-- Total Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-primary">
                                    <a href="{{ route('magang.index') }}" class="text-decoration-none text-primary">Total Magang</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalMagang }}</p>
                            </div>
                            <i class="fas fa-users fa-3x text-primary total-card-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-success">
                                    <a href="{{ route('institusi.index') }}" class="text-decoration-none text-success">Total Instansi</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalInstitusi }}</p>
                            </div>
                            <i class="fas fa-building fa-3x text-success total-card-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-warning">
                                    <a href="{{ route('divisi.index') }}" class="text-decoration-none text-warning">Total Divisi</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalDivisi }}</p>
                            </div>
                            <i class="fas fa-briefcase fa-3x text-warning total-card-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Statistik Magang dan Status Magang -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-dark">Statistik Magang</h5>
                        <select id="chart-type" class="form-control form-control-sm">
                            <option value="monthly">Per Bulan</option>
                            <option value="yearly">Per Tahun</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="magangChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-dark">Status Magang</h5>
                    </div>
                    <div class="card-body chart-container">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-dark">Informasi Tambahan</h5>
                    </div>
                    <div class="card-body">
                        <div class="additional-info">
                            <p class="text-primary mb-0">
                                <i class="fas fa-info-circle mr-2"></i>
                                Informasi tambahan akan ditambahkan di sini.
                            </p>
                        </div>
                    </div>
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
    // Data Chart
    const monthlyData = @json($chartDataMonthly);
    const yearlyData = @json($chartDataYearly);

    // Fungsi Update Charts
    function updateCharts() {
        const chartType = document.getElementById('chart-type').value;

        const chartData = chartType === 'monthly' ? monthlyData : yearlyData;

        // Update line chart
        magangChart.data.labels = chartData.labels;
        magangChart.data.datasets[0].data = chartData.data;
        magangChart.data.datasets[0].label = chartType === 'monthly' ? 'Jumlah Magang per Bulan' : 'Jumlah Magang per Tahun';
        magangChart.update();
    }

    // Line Chart - Magang
    const ctx1 = document.getElementById('magangChart').getContext('2d');
    const magangChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: monthlyData.labels,
            datasets: [{
                label: 'Jumlah Magang per Bulan',
                data: monthlyData.data,
                backgroundColor: 'rgba(52, 152, 219, 0.6)',
                borderColor: 'rgba(52, 152, 219, 1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#2c3e50'
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: '#2c3e50'
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#2c3e50'
                    }
                }
            }
        }
    });

    // Pie Chart - Status Magang
    const ctx2 = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: @json($statusMagang->pluck('status')->toArray()),
            datasets: [{
                data: @json($statusMagang->pluck('total')->toArray()),
                backgroundColor: [
                    'rgba(52, 152, 219, 0.6)',    // Biru
                    'rgba(231, 76, 60, 0.6)',     // Merah
                    'rgba(241, 196, 15, 0.6)'     // Kuning
                ],
                borderColor: [
                    'rgba(52, 152, 219, 1)',
                    'rgba(231, 76, 60, 1)',
                    'rgba(241, 196, 15, 1)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: '#2c3e50'
                    }
                }
            }
        }
    });

    // Event Listener untuk Perubahan Tipe Chart
    document.getElementById('chart-type').addEventListener('change', function() {
        updateCharts();
    });
});
@endpush
