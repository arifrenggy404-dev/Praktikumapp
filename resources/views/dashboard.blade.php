<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7f6;
        }
        .main-content {
            margin-top: 60px;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Admin</a>
            <a class="navbar-brand" href="/posts">Posts</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/welcome">Home</a>
                    </li>
                </ul>

                

                    <form action="/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h2 class="fw-bold">Selamat Datang di Dashboard Utama</h2>
                            <p class="text-muted">Gunakan menu di navigasi atas untuk berpindah halaman atau keluar dari sistem.</p>
                        </div>
                        
                        <hr class="my-4">

                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <div class="p-3 border rounded bg-light">
                                    <h5>Status Server</h5>
                                    <span class="badge bg-success">Online</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="p-3 border rounded bg-light">
                                    <h5>Total Data</h5>
                                    <h4 class="m-0">120</h4>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="p-3 border rounded bg-light">
                                    <h5>User Aktif</h5>
                                    <h4 class="m-0">12</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>