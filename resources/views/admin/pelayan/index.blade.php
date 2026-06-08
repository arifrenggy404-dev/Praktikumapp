@extends('layouts.admin')

@section('title', 'Manajemen Pelayanan')
@section('header', 'Manajemen Pelayanan Gereja')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Pelayan Gereja</h4>
        <p class="text-muted small mb-0">Pendeta, Penatua, Diaken, Vikaris, dan Majelis Jemaat</p>
    </div>
    <a href="{{ route('pelayan.create') }}" class="btn btn-primary fw-bold px-4">
        <i class="fas fa-plus me-2"></i> Tambah Pelayan
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Nama Pelayan</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Jabatan</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Masa Bakti</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Status</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelayans as $p)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="fw-bold text-dark">{{ $p->jemaat->nama_lengkap }}</div>
                                <div class="text-muted small">ID Jemaat: #{{ $p->jemaat_id }}</div>
                            </td>
                            <td class="py-3">
                                <span class="badge {{ $p->jabatan == 'Pendeta' ? 'bg-soft-primary text-primary' : 'bg-soft-success text-success' }} border-0 px-3 py-2">
                                    {{ $p->jabatan }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="small text-dark">
                                    {{ $p->tanggal_mulai ? $p->tanggal_mulai->translatedFormat('d M Y') : '-' }} 
                                    s/d 
                                    {{ $p->tanggal_selesai ? $p->tanggal_selesai->translatedFormat('d M Y') : 'Sekarang' }}
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                @if($p->is_aktif)
                                    <span class="badge bg-success rounded-pill px-3">Aktif</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="py-3 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pelayan.edit', $p->id) }}" class="btn btn-sm btn-light text-warning border">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pelayan.destroy', $p->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger border">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-user-tie fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0">Belum ada data pelayan yang terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-soft-primary { background-color: #eff6ff; color: #2563eb; }
    .bg-soft-success { background-color: #f0fdf4; color: #16a34a; }
</style>
@endsection