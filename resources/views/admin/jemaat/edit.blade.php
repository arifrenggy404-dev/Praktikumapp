@extends('layouts.admin')

@section('title', 'Edit Jemaat')
@section('header', 'Manajemen Warga Jemaat')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">Ubah Data Warga Jemaat</h5>
                        <p class="text-muted small mb-0">Perbarui informasi jemaat yang sudah terdaftar.</p>
                    </div>
                    <a href="{{ route('jemaat.index') }}" class="btn btn-light border btn-sm fw-bold">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body px-4 pb-4">
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nama_lengkap" class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $jemaat->nama_lengkap) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tempat_lahir" class="form-label small fw-bold text-muted text-uppercase">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $jemaat->tempat_lahir) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="jenis_kelamin" class="form-label small fw-bold text-muted text-uppercase">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tanggal_lahir" class="form-label small fw-bold text-muted text-uppercase">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="alamat_domisili" class="form-label small fw-bold text-muted text-uppercase">Alamat Domisili</label>
                            <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" name="alamat_domisili" value="{{ old('alamat_domisili', $jemaat->alamat_domisili) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="status_baptis" class="form-label small fw-bold text-muted text-uppercase">Status Baptis</label>
                            <select class="form-select @error('status_baptis') is-invalid @enderror" id="status_baptis" name="status_baptis" required>
                                <option value="Sudah" {{ (old('status_baptis', $jemaat->status_baptis) == 'Sudah') ? 'selected' : '' }}>Sudah Baptis</option>
                                <option value="Belum" {{ (old('status_baptis', $jemaat->status_baptis) == 'Belum') ? 'selected' : '' }}>Belum Baptis</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="status_sidi" class="form-label small fw-bold text-muted text-uppercase">Status Sidi</label>
                            <select class="form-select @error('status_sidi') is-invalid @enderror" id="status_sidi" name="status_sidi" required>
                                <option value="Sudah" {{ (old('status_sidi', $jemaat->status_sidi) == 'Sudah') ? 'selected' : '' }}>Sudah Sidi</option>
                                <option value="Belum" {{ (old('status_sidi', $jemaat->status_sidi) == 'Belum') ? 'selected' : '' }}>Belum Sidi</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning text-white px-5 fw-bold">Perbarui Data Jemaat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection