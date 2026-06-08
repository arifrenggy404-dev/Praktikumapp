@extends('layouts.admin')

@section('title', 'Edit Pelayan Gereja')
@section('header', 'Edit Pelayan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold">Form Update Pelayan</h5>
                <p class="text-muted small mb-0">Ubah detail jabatan pelayanan warga jemaat.</p>
            </div>
            <div class="card-body px-4 pb-4">
                <form action="{{ route('pelayan.update', $pelayan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="jemaat_id" class="form-label small fw-bold text-muted text-uppercase">Warga Jemaat</label>
                        <select class="form-select select2-ajax @error('jemaat_id') is-invalid @enderror" id="jemaat_id" name="jemaat_id" required>
                            <option value="{{ $pelayan->jemaat_id }}" selected>{{ $pelayan->jemaat->nama_lengkap }}</option>
                        </select>
                        @error('jemaat_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jabatan" class="form-label small fw-bold text-muted text-uppercase">Jabatan Pelayanan</label>
                        <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required>
                            @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan }}" {{ (old('jabatan') ?? $pelayan->jabatan) == $jabatan ? 'selected' : '' }}>
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
                            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') ?? ($pelayan->tanggal_mulai ? $pelayan->tanggal_mulai->format('Y-m-d') : '') }}">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_selesai" class="form-label small fw-bold text-muted text-uppercase">Tanggal Selesai Jabatan (Opsional)</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') ?? ($pelayan->tanggal_selesai ? $pelayan->tanggal_selesai->format('Y-m-d') : '') }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <input type="hidden" name="is_aktif" value="0">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_aktif" name="is_aktif" value="1" {{ (old('is_aktif') ?? $pelayan->is_aktif) ? 'checked' : '' }}>
                            <label class="form-check-label small fw-bold text-muted text-uppercase" for="is_aktif">Set Sebagai Pelayan Aktif</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('pelayan.index') }}" class="btn btn-light px-4 border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold">Update Data Pelayan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<style>
    .select2-container--bootstrap-5 .select2-selection {
        border-radius: 0.5rem;
        padding: 0.4rem;
        height: auto;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2-ajax').select2({
        theme: 'bootstrap-5',
        ajax: {
            url: "{{ route('jemaat.search') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Ketik nama jemaat...',
        minimumInputLength: 1
    });
});
</script>
@endsection