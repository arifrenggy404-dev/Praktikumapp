@extends('layouts.app')

@section('title', 'GKS Kandara - Bertumbuh dalam Iman, Melayani dalam Kasih')

@section('styles')
    <style>
        :root {
            --church-navy: #1e3a8a;
            --church-gold: #b45309;
            --church-cream: #fdfbf7;
            --church-accent: #d97706;
        }

        h1, h2, h3, .serif {
            font-family: 'Playfair Display', serif;
        }

        .hero-section { 
            background-color: var(--church-navy);
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url("{{ asset('images/latar-beranda.jpg') }}");
            background-size: cover;
            background-position: center;
            color: white; 
            padding: 180px 0; 
            position: relative;
            border-bottom: 5px solid var(--church-gold);
            text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
        }

        .hero-section h1, .hero-section h2 {
            text-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

        /* Subtle Sumba-inspired pattern overlay */
        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M50 0 L100 50 L50 100 L0 50 Z' fill='none' stroke='rgba(217, 119, 6, 0.1)' stroke-width='1'/%3E%3C/svg%3E");
            background-size: 80px 80px;
            opacity: 0.3;
        }

        .church-logo-circle {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 0 30px rgba(0,0,0,0.3);
            border: 3px solid var(--church-gold);
            overflow: hidden;
        }

        .feature-card {
            border: 1px solid #e2e8f0;
            border-radius: 0; /* More formal sharp corners or slight round */
            padding: 40px 30px;
            background: white;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            border-top: 4px solid var(--church-navy);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
            border-top-color: var(--church-gold);
        }

        .feature-title {
            color: var(--church-navy);
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        .section-title {
            position: relative;
            padding-bottom: 20px;
            margin-bottom: 40px;
            color: var(--church-navy);
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--church-gold);
        }

        .stat-banner {
            background-color: var(--church-cream);
            padding: 80px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .btn-church {
            background-color: var(--church-gold);
            color: white !important;
            padding: 14px 35px;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            border: none;
        }

        .btn-church:hover {
            background-color: var(--church-navy);
            transform: translateY(-2px);
        }

        .btn-outline-church {
            border: 2px solid white;
            color: white !important;
            padding: 14px 35px;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            background: transparent;
        }

        .btn-outline-church:hover {
            background: white;
            color: var(--church-navy) !important;
        }

        .pillar-label {
            display: block;
            font-size: 0.8rem;
            color: var(--church-gold);
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
    </style>
@endsection

@section('content')
<header class="hero-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="church-logo-circle">
                    <img src="{{ asset('images/logo-gks.png') }}" alt="Logo GKS Sumba" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h1 class="display-3 fw-bold mb-3">Gereja Kristen Sumba</h1>
                <h2 class="h3 mb-4 opacity-90" style="font-weight: 400; font-style: italic;">Jemaat Kandara</h2>
                <div class="mx-auto my-4" style="width: 100px; height: 2px; background: var(--church-gold);"></div>
                <p class="lead mb-5 fs-4 mx-auto" style="max-width: 800px; font-family: 'Inter', sans-serif;">
                    "Bertumbuh dalam Iman, Teguh dalam Pengharapan, dan Melayani dalam Kasih"
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ url('/jadwal-pelayanan') }}" class="btn btn-church">
                        Agenda Pelayanan
                    </a>
                    <a href="{{ url('/statistik') }}" class="btn btn-outline-church">
                        Data Jemaat
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title h1">Tritugas Panggilan Gereja</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Melaksanakan tugas persekutuan, kesaksian, dan pelayanan demi kemuliaan Tuhan.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="mb-3 text-church-gold">
                        <i class="fas fa-hands-praying fa-2x"></i>
                    </div>
                    <span class="pillar-label">Koinonia</span>
                    <h4 class="feature-title serif">Persekutuan</h4>
                    <p class="text-muted mb-4">Membangun kebersamaan antar warga jemaat sebagai satu tubuh Kristus melalui data yang terintegrasi.</p>
                    <a href="{{ url('/statistik') }}" class="text-decoration-none fw-bold" style="color: var(--church-navy);">
                        Lihat Statistik <i class="fas fa-arrow-right ms-2 small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="mb-3 text-church-gold">
                        <i class="fas fa-book-bible fa-2x"></i>
                    </div>
                    <span class="pillar-label">Marturia</span>
                    <h4 class="feature-title serif">Kesaksian</h4>
                    <p class="text-muted mb-4">Menyampaikan kabar sukacita dan informasi jemaat secara transparan melalui warta digital.</p>
                    <a href="{{ route('public.warta') }}" class="text-decoration-none fw-bold" style="color: var(--church-navy);">
                        Unduh Warta <i class="fas fa-arrow-right ms-2 small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="mb-3 text-church-gold">
                        <i class="fas fa-heart-pulse fa-2x"></i>
                    </div>
                    <span class="pillar-label">Diakonia</span>
                    <h4 class="feature-title serif">Pelayanan</h4>
                    <p class="text-muted mb-4">Mengatur tata laksana ibadah dan pelayanan kasih dengan tertib dan teratur bagi seluruh jemaat.</p>
                    <a href="{{ url('/jadwal-pelayanan') }}" class="text-decoration-none fw-bold" style="color: var(--church-navy);">
                        Jadwal Ibadah <i class="fas fa-arrow-right ms-2 small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stat-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="serif h2 mb-4">Tentang SIMJ Kandara</h3>
                <p class="text-muted fs-5 mb-4">Sistem Informasi Manajemen Jemaat (SIMJ) adalah sarana penunjang administrasi gereja untuk mewujudkan pelayanan yang lebih efektif di lingkup GKS Kandara.</p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-white border-start border-4 border-warning shadow-sm">
                            <h6 class="fw-bold mb-1">Aman</h6>
                            <p class="small text-muted mb-0">Privasi jemaat terjaga</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white border-start border-4 border-primary shadow-sm">
                            <h6 class="fw-bold mb-1">Cepat</h6>
                            <p class="small text-muted mb-0">Informasi terpadu</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="bg-white p-5 text-center shadow-lg border-bottom border-5 border-primary">
                    <h6 class="text-uppercase fw-bold text-muted mb-4" style="letter-spacing: 2px;">Kekuatan Jemaat</h6>
                    <div class="display-3 fw-bold mb-2 serif" style="color: var(--church-navy);">{{ number_format($totalJemaat, 0, ',', '.') }}</div>
                    <p class="text-muted fw-bold">Warga Jemaat Terdaftar</p>
                    <hr class="my-4 mx-auto" style="width: 50px;">
                    <p class="small text-muted italic">"Sebab sama seperti pada satu tubuh kita mempunyai banyak anggota..." (Roma 12:4)</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection