@extends('layouts.admin')

@section('title', 'Dashboard Utama')
@section('header', 'Ringkasan Sistem')

@section('styles')
    <style>
        .stat-card {
            border: 1px solid var(--border-color);
            border-radius: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .bg-soft-primary { background-color: #eff6ff; color: #2563eb; }
        .bg-soft-success { background-color: #f0fdf4; color: #16a34a; }
        .bg-soft-warning { background-color: #fffbeb; color: #d97706; }
    </style>
@endsection

@section('content')
<div class="mb-4">
    <h3 class="fw-bold text-dark">Selamat Datang 👋</h3>
    <p class="text-muted">Pantau dan kelola data operasional GKS Kandara dalam satu panel.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card stat-card border-0 bg-white p-4">
            <div class="icon-box bg-soft-primary">
                <i class="fas fa-users"></i>
            </div>
            <h6 class="text-muted text-uppercase small fw-bold">Total Jemaat</h6>
            <h2 class="fw-bold text-dark mb-0">{{ number_format($totalJemaat, 0, ',', '.') }}</h2>
            <small class="text-success fw-medium mt-2 d-block">
                <i class="fas fa-sync-alt me-1"></i> Ter-update otomatis
            </small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card border-0 bg-white p-4">
            <div class="icon-box bg-soft-success">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h6 class="text-muted text-uppercase small fw-bold">Jadwal Pelayanan</h6>
            <h2 class="fw-bold text-dark mb-0">{{ $totalJadwal }}</h2>
            <small class="text-muted mt-2 d-block">Kegiatan minggu ini</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card border-0 bg-white p-4">
            <div class="icon-box bg-soft-warning">
                <i class="fas fa-box-open"></i>
            </div>
            <h6 class="text-muted text-uppercase small fw-bold">Aset Inventaris</h6>
            <h2 class="fw-bold text-dark mb-0">{{ number_format($totalInventaris, 0, ',', '.') }}</h2>
            <small class="text-muted mt-2 d-block">Unit terdata di gudang</small>
        </div>
    </div>
</div>

@endsection