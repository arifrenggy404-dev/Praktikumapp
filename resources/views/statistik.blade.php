@extends('layouts.app')

@section('title', 'Statistik Jemaat - GKS Kandara')

@section('styles')
    <style>
        .page-header {
            background-color: var(--church-navy);
            color: white;
            padding: 80px 0;
            border-bottom: 5px solid var(--church-gold);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M50 0 L100 50 L50 100 L0 50 Z' fill='none' stroke='rgba(217, 119, 6, 0.1)' stroke-width='1'/%3E%3C/svg%3E");
            background-size: 80px 80px;
            opacity: 0.2;
        }

        .stat-card-custom {
            border: 1px solid #e2e8f0;
            background: white;
            padding: 30px;
            text-align: center;
            height: 100%;
            border-top: 4px solid var(--church-gold);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--church-navy);
            font-family: 'Playfair Display', serif;
            margin-bottom: 10px;
        }

        .chart-box {
            background: #fff;
            padding: 25px;
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')
<header class="page-header text-center">
    <div class="container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">Statistik Jemaat</h1>
        <p class="lead opacity-90 mx-auto" style="max-width: 600px;">Data pertumbuhan dan komposisi jemaat GKS Kandara.</p>
    </div>
</header>

<main class="container my-5 py-4">
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card-custom">
                <h6 class="text-uppercase text-muted fw-bold mb-3" style="letter-spacing: 1px;">Total Jemaat</h6>
                <div class="stat-number">{{ number_format($totalJemaat, 0, ',', '.') }}</div>
                <p class="text-muted mb-0 small">Jiwa Terdaftar</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-custom" style="border-top-color: var(--church-navy);">
                <h6 class="text-uppercase text-muted fw-bold mb-3" style="letter-spacing: 1px;">Laki-laki</h6>
                <div class="stat-number">{{ number_format($pria, 0, ',', '.') }}</div>
                <p class="text-muted mb-0 small">Jiwa Terdaftar</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-custom" style="border-top-color: var(--church-navy);">
                <h6 class="text-uppercase text-muted fw-bold mb-3" style="letter-spacing: 1px;">Perempuan</h6>
                <div class="stat-number">{{ number_format($wanita, 0, ',', '.') }}</div>
                <p class="text-muted mb-0 small">Jiwa Terdaftar</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="chart-box">
                <h5 class="fw-bold mb-4 serif border-bottom pb-2">Status Gerejawi</h5>
                <div class="d-flex justify-content-between mb-3">
                    <span>Sudah Baptis</span>
                    <span class="fw-bold">{{ number_format($baptis, 0, ',', '.') }}</span>
                </div>
                <div class="progress mb-4" style="height: 10px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalJemaat > 0 ? ($baptis/$totalJemaat)*100 : 0 }}%; background-color: var(--church-navy) !important;"></div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Sudah Sidi</span>
                    <span class="fw-bold">{{ number_format($sidi, 0, ',', '.') }}</span>
                </div>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalJemaat > 0 ? ($sidi/$totalJemaat)*100 : 0 }}%; background-color: var(--church-gold) !important;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="chart-box">
                <h5 class="fw-bold mb-4 serif border-bottom pb-2">Kelompok Usia</h5>
                <div class="d-flex justify-content-between mb-2">
                    <span>Anak & Remaja (< 17 th)</span>
                    <span class="fw-bold">{{ $anakRemaja }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Pemuda & Dewasa (17 - 50 th)</span>
                    <span class="fw-bold">{{ $pemudaDewasa }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Lansia (> 50 th)</span>
                    <span class="fw-bold">{{ $lansia }}</span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection