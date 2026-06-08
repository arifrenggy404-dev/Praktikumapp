@extends('layouts.admin')

@section('title', 'Kelola Data Jemaat')
@section('header', 'Manajemen Warga Jemaat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Warga Jemaat</h4>
        <p class="text-muted small mb-0">Total terdata: {{ $jemaats->total() }} Jiwa</p>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('jemaat.index') }}" method="GET" class="d-flex">
            <div class="input-group">
                <input type="text" name="search" class="form-control border-end-0 shadow-sm" placeholder="Cari nama/alamat..." value="{{ request('search') }}">
                <button class="btn btn-white border border-start-0 shadow-sm text-muted" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <a href="{{ route('jemaat.create') }}" class="btn btn-primary fw-bold px-4 shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah
        </a>
    </div>
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
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Nama Lengkap</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">TTL</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Status Gerejawi</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jemaats as $jemaat)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="fw-bold text-dark">{{ $jemaat->nama_lengkap }}</div>
                                <div class="text-muted small">{{ $jemaat->alamat_domisili }}</div>
                            </td>
                            <td class="py-3">
                                <div class="small text-dark">{{ $jemaat->tempat_lahir }}</div>
                                <div class="text-muted small">{{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->translatedFormat('d M Y') }}</div>
                            </td>
                            <td class="py-3">
                                <span class="badge {{ $jemaat->status_baptis == 'Sudah' ? 'bg-soft-primary text-primary' : 'bg-light text-muted' }} border-0 px-2 py-1">
                                    Baptis: {{ $jemaat->status_baptis }}
                                </span>
                                <span class="badge {{ $jemaat->status_sidi == 'Sudah' ? 'bg-soft-success text-success' : 'bg-light text-muted' }} border-0 px-2 py-1 ms-1">
                                    Sidi: {{ $jemaat->status_sidi }}
                                </span>
                            </td>
                            <td class="py-3 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="btn btn-sm btn-light text-warning border">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST" class="delete-form">
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
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-user-slash fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0">Belum ada data jemaat yang tersimpan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $jemaats->links() }}
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-soft-primary { background-color: #eff6ff; color: #2563eb; }
    .bg-soft-success { background-color: #f0fdf4; color: #16a34a; }
</style>
@endsection