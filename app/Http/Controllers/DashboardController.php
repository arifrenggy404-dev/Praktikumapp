<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Inventaris;
use App\Models\JadwalPelayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan Halaman Utama Dashboard Admin
     */
    public function index()
    {
        // 1. PERBAIKAN DI BARIS INI: Mengubah 'Mengitung' menjadi 'Menghitung'
        // Menghitung total baris data pada tabel jemaats
        $totalJemaat = Jemaat::count();

        // 2. Menghitung total akumulasi unit barang pada tabel inventaris
        // Menggunakan fungsi sum() untuk menjumlahkan isi dari kolom 'jumlah_kuantitas'
        $totalInventaris = Inventaris::sum('jumlah_kuantitas') ?? 0;

        // 3. Menghitung total baris data pada tabel jadwal_pelayanans
        $totalJadwal = JadwalPelayanan::count();

        // 4. Melempar semua data statistik ke dalam view 'admin.dashboard' menggunakan compact()
        return view('admin.dashboard', compact('totalJemaat', 'totalInventaris', 'totalJadwal'));
    }
}