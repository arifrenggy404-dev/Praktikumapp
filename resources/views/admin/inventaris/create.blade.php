@extends('layouts.admin')

@section('title', 'Tambah Inventaris')
@section('header', 'Registrasi Inventaris Barang Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold">Form Inventarisasi Barang</h5>
                <p class="text-muted small mb-0">Masukkan detail aset atau sarana prasarana baru jemaat.</p>
            </div>
            <div class="card-body px-4 pb-4">
                <form action="{{ route('inventaris.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nama_barang" class="form-label small fw-bold text-muted text-uppercase">Nama Barang / Fasilitas</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" placeholder="Contoh: Kursi Plastik" value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="jumlah_kuantitas" class="form-label small fw-bold text-muted text-uppercase">Jumlah Kuantitas (Unit)</label>
                            <input type="number" class="form-control @error('jumlah_kuantitas') is-invalid @enderror" id="jumlah_kuantitas" name="jumlah_kuantitas" min="1" placeholder="Contoh: 50" value="{{ old('jumlah_kuantitas') }}" required>
                            @error('jumlah_kuantitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="kondisi_id" class="form-label small fw-bold text-muted text-uppercase">Kondisi Fisik Saat Ini</label>
                            <select class="form-select @error('kondisi_id') is-invalid @enderror" id="kondisi_id" name="kondisi_id" required>
                                <option value="">-- Pilih Kondisi Barang --</option>
                                @foreach($kondisis as $k)
                                    <option value="{{ $k->id }}" {{ old('kondisi_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kondisi }}</option>
                                @endforeach
                            </select>
                            @error('kondisi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('inventaris.index') }}" class="btn btn-light px-4 border fw-bold">Batal</a>
                            <button type="submit" class="btn btn-primary px-5 fw-bold">Simpan Log Inventaris</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection