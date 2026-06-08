@extends('layouts.admin')

@section('title', 'Kelola Warta Jemaat')
@section('header', 'Manajemen Warta Jemaat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Warta Jemaat</h4>
        <p class="text-muted small mb-0">Kelola file PDF warta mingguan untuk diunduh jemaat.</p>
    </div>
    <a href="{{ route('warta.create') }}" class="btn btn-primary fw-bold px-4 shadow-sm">
        <i class="fas fa-plus me-2"></i> Unggah Warta
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
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Judul Warta</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Tanggal Terbit</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Nama File</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wartas as $w)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="fw-bold text-dark">{{ $w->judul }}</div>
                            </td>
                            <td class="py-3">
                                <div class="text-muted small">
                                    <i class="far fa-calendar-alt me-1"></i> {{ $w->tanggal_terbit->translatedFormat('d F Y') }}
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-light text-primary border px-2 py-1">
                                    <i class="fas fa-file-pdf me-1"></i> {{ $w->file_path }}
                                </span>
                            </td>
                            <td class="py-3 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('warta.download', $w->file_path) }}" class="btn btn-sm btn-light text-primary border" title="Download">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <form action="{{ route('warta.destroy', $w->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger border" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-file-invoice fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0">Belum ada warta jemaat yang diunggah.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $wartas->links() }}
    </div>
</div>
@endsection
