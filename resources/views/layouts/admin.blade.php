<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - SIM GKS Kandara</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --primary-color: #2563eb;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg); 
            color: #334155;
        }

        .sidebar { 
            min-height: 100vh; 
            background-color: var(--sidebar-bg); 
            color: white;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
            position: fixed;
            width: inherit;
            z-index: 100;
        }

        .sidebar-header {
            padding: 30px 20px;
            background-color: rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar a { 
            color: #94a3b8; 
            text-decoration: none; 
            display: flex;
            align-items: center;
            padding: 12px 25px; 
            transition: all 0.2s;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .sidebar a i {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .sidebar a:hover, .sidebar a.active { 
            color: white; 
            background-color: var(--sidebar-hover); 
            border-left: 4px solid var(--primary-color);
            padding-left: 21px;
        }

        .main-content {
            margin-left: 16.666667%; 
            padding: 40px;
        }

        @media (max-width: 768px) {
            .sidebar { position: relative; min-height: auto; width: 100%; }
            .main-content { margin-left: 0; }
        }

        .navbar-top {
            background-color: white;
            padding: 15px 40px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }
        
        @yield('styles')
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <div class="sidebar-header">
                <h5 class="mb-0 fw-bold text-white d-flex align-items-center">
                    <i class="fas fa-church text-primary me-2"></i> SIM GKS
                </h5>
                <small class="text-muted text-uppercase fw-bold mt-1 d-block" style="font-size: 10px; letter-spacing: 1px;">Kandara - Sekretariat</small>
            </div>
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <a href="{{ route('jemaat.index') }}" class="{{ Request::is('jemaat*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Data Jemaat
                </a>
                <a href="{{ route('pelayan.index') }}" class="{{ Request::is('pelayan*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i> Manajemen Pelayanan
                </a>
                <a href="{{ route('jadwal.index') }}" class="{{ Request::is('jadwal*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Jadwal Pelayanan
                </a>
                <a href="{{ route('warta.index') }}" class="{{ Request::is('warta*') ? 'active' : '' }}">
                    <i class="fas fa-file-invoice"></i> Warta Jemaat
                </a>
                <a href="{{ route('inventaris.index') }}" class="{{ Request::is('inventaris*') ? 'active' : '' }}">
                    <i class="fas fa-boxes"></i> Inventaris Aset
                </a>
                
                <div class="mt-5 px-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-bold rounded-pill">
                            <i class="fas fa-sign-out-alt me-2"></i> KELUAR
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2 p-0">
            <nav class="navbar-top d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">@yield('header', 'Ringkasan Sistem')</h5>
                </div>
                <div class="d-flex align-items-center">
                    <div class="text-end me-3 d-none d-md-block">
                        <div class="small fw-bold text-dark">{{ Auth::user()->jemaat->nama_lengkap ?? 'Admin' }}</div>
                        <div class="text-muted" style="font-size: 11px;">Administrator</div>
                    </div>
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </nav>

            <div class="px-4 pb-5">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // Global SweetAlert2 for Delete Confirmation
    $(document).on('submit', '.delete-form', function (e) {
        e.preventDefault();
        const form = this;
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#f8fafc',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-primary px-4 py-2 rounded-pill fw-bold',
                cancelButton: 'btn btn-light px-4 py-2 rounded-pill fw-bold text-muted ms-2'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    // Global SweetAlert2 for Success Messages
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            customClass: {
                popup: 'rounded-4 border-0 shadow'
            }
        });
    @endif
</script>

@yield('scripts')
</body>
</html>
