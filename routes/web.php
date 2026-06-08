<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JadwalPelayananController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\PelayanController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WartaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// --- AREA PUBLIK (JEMAAT) ---
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/jadwal-pelayanan', [PublicController::class, 'jadwal'])->name('public.jadwal');
Route::get('/statistik', [PublicController::class, 'statistik'])->name('public.statistik');
Route::get('/warta-jemaat', [WartaController::class, 'publicIndex'])->name('public.warta');

// --- AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- AREA ADMIN (ADMIN) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('jemaat', JemaatController::class);
    Route::get('/jemaat-search', [JemaatController::class, 'search'])->name('jemaat.search');
    Route::resource('jadwal', JadwalPelayananController::class);
    Route::resource('inventaris', InventarisController::class);
    Route::resource('pelayan', PelayanController::class);
    Route::resource('warta', WartaController::class);
});

// --- SISTEM ---
Route::get('/unduh-warta/{filename}', function ($filename) {
    $path = storage_path('app/public/warta/' . $filename);
    if (!file_exists($path)) {
        abort(404, 'File Warta Jemaat tidak ditemukan.');
    }
    return response()->download($path);
})->name('warta.download');
