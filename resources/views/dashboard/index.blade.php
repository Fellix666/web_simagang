@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css">
@endsection

@section('content')
<style>
    body {
        background-color: #f4f6f9;
        color: #2c3e50;
    }
    .dashboard-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        padding: 30px;
        margin: 20px;
        min-height: 80vh;
        overflow: hidden;
    }

    .card {
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        color: #2c3e50;
        height: 100%;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
        color: #2c3e50;
    }
    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }
<<<<<<< HEAD

=======
>>>>>>> origin/mc
</style>

<div class="container-fluid d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <div class="dashboard-container w-100 px-3 px-md-5">
        <!-- Total Cards -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-primary">
                                    <a href="{{ route('magang.index') }}" class="text-decoration-none text-primary">Total Magang</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalMagang }}</p>
                            </div>
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-success">
                                    <a href="{{ route('institusi.index') }}" class="text-decoration-none text-success">Total Institusi</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalInstitusi }}</p>
                            </div>
                            <i class="fas fa-building fa-3x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-warning">
                                    <a href="{{ route('divisi.index') }}" class="text-decoration-none text-warning">Total Divisi</a>
                                </h5>
                                <p class="card-text display-6 text-dark">{{ $totalDivisi }}</p>
                            </div>
                            <i class="fas fa-briefcase fa-3x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Statistik Magang dan Status Magang -->
        <div class="row">
            <div class="col-12 col-md-8 mb-3">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-dark">Statistik Magang</h5>
                        <div class="d-flex gap-2">
                            <select id="year-selector" class="form-control form-control-sm w-auto bg-white text-dark me-2">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                        Tahun {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                            <select id="chart-type" class="form-control form-control-sm w-auto bg-white text-dark">
                                <option value="monthly">Per Bulan</option>
                                <option value="yearly">Per Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body chart-container">
                        <canvas id="magangChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
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
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title text-dark">Informasi Tambahan</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert bg-light text-primary">
                            <i class="fas fa-info-circle mr-2"></i>
                            Informasi tambahan akan ditambahkan di sini.
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
<<<<<<< HEAD

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
=======
    
    const yearSelector = document.getElementById('year-selector');
    const chartTypeSelector = document.getElementById('chart-type');
>>>>>>> origin/mc

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

    // Function to toggle year selector visibility
    function toggleYearSelector(chartType) {
        if (chartType === 'yearly') {
            yearSelector.style.display = 'none';
        } else {
            yearSelector.style.display = 'block';
        }
    }

    // Fungsi Update Charts
    function updateCharts() {
        const chartType = chartTypeSelector.value;
        
        // Toggle year selector visibility
        toggleYearSelector(chartType);
        
        const chartData = chartType === 'monthly' ? monthlyData : yearlyData;

        // Update line chart
        magangChart.data.labels = chartData.labels;
        magangChart.data.datasets[0].data = chartData.data;
        magangChart.data.datasets[0].label = chartType === 'monthly' ? 'Jumlah Magang per Bulan' : 'Jumlah Magang per Tahun';
        magangChart.update();
    }

    // Event Listeners
    chartTypeSelector.addEventListener('change', function() {
        updateCharts();
    });

    yearSelector.addEventListener('change', function() {
        window.location.href = `${window.location.pathname}?year=${this.value}`;
    });

    // Initialize year selector visibility based on initial chart type
    toggleYearSelector(chartTypeSelector.value);
});
</script>
@endpush
