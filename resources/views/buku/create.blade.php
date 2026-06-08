<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">MyBooks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('buku.index') }}">Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 text-gray-800 m-0">Tambah Buku Baru</h1>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('buku.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="judul" class="form-label fw-bold">Judul Buku</label>
                                <input type="text" 
                                       name="judul" 
                                       id="judul" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       placeholder="Masukkan judul menarik..."
                                       value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="penulis" class="form-label fw-bold">Penulis Buku</label>
                                <input type="text" 
                                       name="penulis" 
                                       id="penulis" 
                                       class="form-control @error('penulis') is-invalid @enderror" 
                                       placeholder="Masukkan nama penulis..."
                                       value="{{ old('penulis') }}">
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label fw-bold">Tahun Terbit</label>
                                <input type="text" 
                                       name="tahun_terbit" 
                                       id="tahun_terbit" 
                                       class="form-control @error('tahun_terbit') is-invalid @enderror" 
                                       placeholder="Masukkan tahun terbit..."
                                       value="{{ old('tahun_terbit') }}">
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="penerbit" class="form-label fw-bold">Penerbit Buku</label>
                                <input type="text" 
                                       name="penerbit" 
                                       id="penerbit" 
                                       class="form-control @error('penerbit') is-invalid @enderror" 
                                       placeholder="Masukkan nama penerbit..."
                                       value="{{ old('penerbit') }}">
                                @error('penerbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-light me-md-2">Reset</button>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-send-fill me-1"></i> Simpan Buku
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>