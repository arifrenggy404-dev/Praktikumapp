<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GKS Kandara')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --church-navy: #1e3a8a;
            --church-gold: #b45309;
            --church-cream: #fdfbf7;
            --church-accent: #d97706;
            --primary-color: #1e3a8a;
            --primary-dark: #1e3a8a;
            --secondary-color: #64748b;
            --dark-color: #0f172a;
            --light-color: #f8fafc;
            --border-color: #e2e8f0;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: #ffffff; 
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10 L30 50 M15 25 L45 25' stroke='rgba(30, 58, 138, 0.03)' stroke-width='2' fill='none'/%3E%3C/svg%3E");
            color: #334155;
            line-height: 1.6;
        }

        h1, h2, h3, .serif {
            font-family: 'Playfair Display', serif;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 3px solid var(--church-gold);
            padding: 15px 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: var(--church-navy) !important;
        }

        .nav-link {
            font-weight: 600;
            color: var(--secondary-color) !important;
            transition: color 0.2s;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--church-gold) !important;
        }

        .footer {
            background-color: var(--church-navy);
            color: #94a3b8;
            padding: 60px 0;
            border-top: 5px solid var(--church-gold);
        }

        .btn-church {
            background-color: var(--church-gold);
            color: white !important;
            padding: 12px 30px;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            border: none;
            display: inline-block;
            text-decoration: none;
        }

        .btn-church:hover {
            background-color: var(--church-navy);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .section-title {
            position: relative;
            padding-bottom: 20px;
            margin-bottom: 40px;
            color: var(--church-navy);
            font-weight: 700;
            text-align: center;
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

        @yield('styles')
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="me-3 bg-white d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; border-radius: 8px; border: 1px solid var(--church-gold); overflow: hidden; padding: 2px;">
                <img src="{{ asset('images/logo-gks.png') }}" alt="Logo GKS" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
            <div class="d-flex flex-column">
                <span style="line-height: 1; font-size: 1.2rem;">GKS KANDARA</span>
                <span class="small opacity-75" style="font-family: 'Inter', sans-serif; font-size: 0.65rem; letter-spacing: 1px;">Sumba Timur</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mx-2">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ Request::is('jadwal-pelayanan') ? 'active' : '' }}" href="{{ url('/jadwal-pelayanan') }}">Jadwal Pelayanan</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ Request::is('statistik') ? 'active' : '' }}" href="{{ url('/statistik') }}">Statistik Jemaat</a>
                </li>
                <li class="nav-item ms-lg-3">
                    @if(Auth::check())
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm px-4">Panel Admin</a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-outline-secondary btn-sm px-4">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div> 
</nav>

<main>
    @yield('content')
</main>

<footer class="footer mt-auto">
    <div class="container text-center">
        <div class="mb-4">
            <i class="fas fa-cross fa-2x mb-3" style="color: var(--church-gold);"></i>
            <div class="fw-bold text-white mb-2 h4 serif">Gereja Kristen Sumba</div>
            <div class="text-white opacity-75 mb-4">Jemaat Kandara</div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-auto"><a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none mx-3 small">BERANDA</a></div>
            <div class="col-auto"><a href="{{ url('/jadwal-pelayanan') }}" class="text-white opacity-75 text-decoration-none mx-3 small">JADWAL</a></div>
            <div class="col-auto"><a href="{{ route('public.warta') }}" class="text-white opacity-75 text-decoration-none mx-3 small">WARTA</a></div>
        </div>
        <div class="small opacity-50">&copy; 2026 GKS Kandara. Kandara, Sumba Timur, Nusa Tenggara Timur.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>