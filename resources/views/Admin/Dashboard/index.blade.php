@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Admin - Dashboard';
@endphp

{{-- @push('page-action')
    <div class="btn-list">
        <span class="d-none d-sm-inline">
            <a href="#" class="btn">
                New view
            </a>
        </span>
        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Create new report
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report"
            aria-label="Create new report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
        </a>
    </div>
@endpush --}}

@section('content')
    <div class="row">

        <!-- Pendapatan Hari Ini -->
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6>Pendapatan Hari Ini</h6>
                    <h3>Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Order -->
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6>Total Order</h6>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

        <!-- Produk Tersedia -->
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6>Produk Tersedia</h6>
                    <h3>{{ $availableProducts }}</h3>
                </div>
            </div>
        </div>

        <!-- Produk Habis -->
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h6>Produk Habis</h6>
                    <h3>{{ $outOfStock }}</h3>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">

        <!-- Line Chart Penjualan Bulanan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Penjualan Bulanan</h5>
                </div>
                <div class="card-body">
                    <canvas id="monthlySalesChart" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart Order Mingguan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Order 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <canvas id="weeklyOrdersChart" height="150"></canvas>
                </div>
            </div>
        </div>

    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5>Produk Terlaris</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Pendapatan</th>
                        <th>Stok Saat Ini</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topProducts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->total_sold }}</td>
                            <td>Rp {{ number_format($item->total_revenue, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->stock <= 0)
                                    <span class="badge bg-danger">Habis</span>
                                @elseif ($item->stock < 5)
                                    <span class="badge bg-warning">Menipis ({{ $item->stock }})</span>
                                @else
                                    {{ $item->stock }}
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data penjualan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthNames = [
            "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
        ];

        // Format bulan dari angka → nama bulan
        let formattedMonths = @json($salesMonths).map(m => monthNames[m - 1]);

        // === Line Chart Penjualan Bulanan ===
        new Chart(document.getElementById("monthlySalesChart"), {
            type: 'line',
            data: {
                labels: formattedMonths,
                datasets: [{
                    label: 'Total Penjualan',
                    data: @json($salesValues),
                    borderWidth: 3,
                    fill: false
                }]
            }
        });

        // === Bar Chart Order Mingguan ===
        new Chart(document.getElementById("weeklyOrdersChart"), {
            type: 'bar',
            data: {
                labels: @json($orderDates),
                datasets: [{
                    label: 'Jumlah Order',
                    data: @json($orderValues),
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
