@extends('layouts.admin')

@section('title', 'Terbitkan Jadwal')
@section('header', 'Tambah Jadwal Ibadah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold">Form Penjadwalan Ibadah</h5>
                <p class="text-muted small mb-0">Atur waktu, lokasi, dan petugas pelayanan ibadah mendatang.</p>
            </div>
            <div class="card-body px-4 pb-4">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nama_ibadah" class="form-label small fw-bold text-muted text-uppercase">Nama Ibadah / Kategori</label>
                            <input type="text" class="form-control @error('nama_ibadah') is-invalid @enderror" id="nama_ibadah" name="nama_ibadah" placeholder="Contoh: Ibadah Raya Minggu" value="{{ old('nama_ibadah') }}" required>
                            @error('nama_ibadah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="lokasi_ibadah" class="form-label small fw-bold text-muted text-uppercase">Lokasi / Tempat Ibadah</label>
                            <input type="text" class="form-control @error('lokasi_ibadah') is-invalid @enderror" id="lokasi_ibadah" name="lokasi_ibadah" placeholder="Contoh: Gedung Pusat, Rumah Bpk. X, dll" value="{{ old('lokasi_ibadah') }}" required>
                            @error('lokasi_ibadah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="tanggal" class="form-label small fw-bold text-muted text-uppercase">Tanggal Ibadah</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="jam_mulai" class="form-label small fw-bold text-muted text-uppercase">Jam Mulai</label>
                            <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                            @error('jam_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="jam_selesai" class="form-label small fw-bold text-muted text-uppercase">Jam Selesai (Opsional)</label>
                            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}">
                            <small class="text-muted" style="font-size: 10px;">Kosongkan jika ingin tampil "Jam s/d Selesai"</small>
                            @error('jam_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 mb-3">
                        <h6 class="fw-bold text-dark border-start border-primary border-4 ps-3 mb-4">Petugas Pelayan (Pemimpin Ibadah)</h6>
                    </div>

                    <div id="petugas-container">
                        <div class="row g-3 mb-3 align-items-center">
                            <div class="col-md-12">
                                <label class="small text-muted mb-1">Pilih Petugas / Pemimpin Ibadah</label>
                                <select class="form-select @error('pelayan_id') is-invalid @enderror" name="pelayan_id" required>
                                    <option value="">-- Pilih Pelayan --</option>
                                    @foreach($jemaats as $j)
                                        <option value="{{ $j->id }}" {{ old('pelayan_id') == $j->id ? 'selected' : '' }}>
                                            {{ $j->nama_lengkap }} ({{ $j->pelayan->jabatan }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('pelayan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-light px-4 border fw-bold">Batal</a>
                            <button type="submit" class="btn btn-primary px-5 fw-bold">Terbitkan Jadwal Ibadah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection