@extends('layouts.admin')

@section('title', 'Tambah Pelayan Gereja')
@section('header', 'Tambah Pelayan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold">Form Registrasi Pelayan</h5>
                <p class="text-muted small mb-0">Tentukan jabatan pelayanan bagi warga jemaat.</p>
            </div>
            <div class="card-body px-4 pb-4">
                <form action="{{ route('pelayan.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4 position-relative">
                        <label for="jemaat_search" class="form-label small fw-bold text-muted text-uppercase">Cari Warga Jemaat (Ketik Nama)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 py-2 @error('jemaat_id') is-invalid @enderror" 
                                   id="jemaat_search" placeholder="Ketik nama jemaat untuk mencari..." autocomplete="off" style="border-radius: 0 10px 10px 0;">
                            <input type="hidden" name="jemaat_id" id="jemaat_id_hidden">
                        </div>
                        
                        <!-- Kontainer Hasil Pencarian -->
                        <div id="search_results" class="shadow-lg d-none" style="
                            position: absolute;
                            top: 100%;
                            left: 0;
                            right: 0;
                            z-index: 9999;
                            background: white;
                            border: 1px solid #dee2e6;
                            border-radius: 10px;
                            margin-top: 5px;
                            max-height: 250px;
                            overflow-y: auto;
                        ">
                        </div>

                        @error('jemaat_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jabatan" class="form-label small fw-bold text-muted text-uppercase">Jabatan Pelayanan</label>
                        <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan }}" {{ old('jabatan') == $jabatan ? 'selected' : '' }}>
                                    {{ $jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_mulai" class="form-label small fw-bold text-muted text-uppercase">Tanggal Mulai Jabatan</label>
                            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_selesai" class="form-label small fw-bold text-muted text-uppercase">Tanggal Selesai Jabatan (Opsional)</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_aktif" name="is_aktif" value="1" checked>
                            <label class="form-check-label small fw-bold text-muted text-uppercase" for="is_aktif">Set Sebagai Pelayan Aktif</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('pelayan.index') }}" class="btn btn-light px-4 border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold">Simpan Data Pelayan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .result-item {
        padding: 12px 20px;
        cursor: pointer;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.2s;
        text-align: left;
        width: 100%;
        display: block;
        background: white;
        border-left: none;
        border-right: none;
        border-top: none;
    }
    .result-item:last-child {
        border-bottom: none;
    }
    .result-item:hover {
        background-color: #f8fafc;
        color: #2563eb;
        padding-left: 25px;
    }
</style>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    let searchTimer;
    const searchInput = $('#jemaat_search');
    const resultsContainer = $('#search_results');
    const hiddenIdInput = $('#jemaat_id_hidden');

    searchInput.on('input', function() {
        clearTimeout(searchTimer);
        const query = $(this).val();

        if (query.length < 1) {
            resultsContainer.addClass('d-none');
            return;
        }

        searchTimer = setTimeout(function() {
            $.ajax({
                url: "{{ route('jemaat.search') }}",
                data: { q: query },
                dataType: 'json',
                success: function(data) {
                    resultsContainer.empty().removeClass('d-none');
                    if (data.length > 0) {
                        data.forEach(function(item) {
                            resultsContainer.append(`
                                <button type="button" class="result-item" data-id="${item.id}">
                                    <i class="fas fa-user me-2 text-muted"></i> ${item.text}
                                </button>
                            `);
                        });
                    } else {
                        resultsContainer.append('<div class="p-3 text-muted small text-center">Jemaat tidak ditemukan.</div>');
                    }
                },
                error: function(xhr) {
                    console.error('Search error:', xhr.responseText);
                }
            });
        }, 300);
    });

    $(document).on('click', '.result-item', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        const name = $(this).text().trim();
        
        searchInput.val(name);
        hiddenIdInput.val(id);
        resultsContainer.addClass('d-none');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.position-relative').length) {
            resultsContainer.addClass('d-none');
        }
    });
});
</script>
@endsection
