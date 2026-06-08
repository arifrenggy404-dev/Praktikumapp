<?php

namespace Database\Seeders;

use App\Models\Jemaat;
use App\Models\KartuKeluarga;
use App\Models\Pelayan;
use App\Models\Inventaris;
use App\Models\KondisiBarang;
use App\Models\JadwalPelayanan;
use App\Models\PelayanJadwal;
use App\Models\Warta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kartu Keluarga
        $kk1 = KartuKeluarga::create(['no_kk_gereja' => 'KK-001', 'kepala_keluarga_id' => null]);
        $kk2 = KartuKeluarga::create(['no_kk_gereja' => 'KK-002', 'kepala_keluarga_id' => null]);

        // 2. Jemaat
        $j1 = Jemaat::create([
            'kartu_keluarga_id' => $kk1->id,
            'nama_lengkap' => 'Bpk. Yohanes',
            'tempat_lahir' => 'Waingapu',
            'tanggal_lahir' => '1970-05-10',
            'alamat_domisili' => 'Kandara RT 01',
            'status_baptis' => 'Sudah',
            'status_sidi' => 'Sudah',
        ]);
        
        $j2 = Jemaat::create([
            'kartu_keluarga_id' => $kk1->id,
            'nama_lengkap' => 'Ibu Maria',
            'tempat_lahir' => 'Lewa',
            'tanggal_lahir' => '1975-08-20',
            'alamat_domisili' => 'Kandara RT 01',
            'status_baptis' => 'Sudah',
            'status_sidi' => 'Sudah',
        ]);

        $j3 = Jemaat::create([
            'kartu_keluarga_id' => $kk2->id,
            'nama_lengkap' => 'Pdt. Andreas',
            'tempat_lahir' => 'Kupang',
            'tanggal_lahir' => '1980-12-12',
            'alamat_domisili' => 'Pastori GKS Kandara',
            'status_baptis' => 'Sudah',
            'status_sidi' => 'Sudah',
        ]);

        // Update Kepala Keluarga
        $kk1->update(['kepala_keluarga_id' => $j1->id]);
        $kk2->update(['kepala_keluarga_id' => $j3->id]);

        // 3. Pelayan
        Pelayan::create([
            'jemaat_id' => $j3->id,
            'jabatan' => 'Pendeta',
            'tanggal_mulai' => '2020-01-01',
            'is_aktif' => true,
        ]);

        Pelayan::create([
            'jemaat_id' => $j1->id,
            'jabatan' => 'Penatua',
            'tanggal_mulai' => '2022-06-01',
            'is_aktif' => true,
        ]);

        // 4. Inventaris
        $kondisiBagus = DB::table('kondisi_barangs')->where('nama_kondisi', 'Bagus')->first()->id;
        
        Inventaris::create([
            'nama_barang' => 'Kursi Plastik',
            'jumlah_kuantitas' => 100,
            'kondisi_id' => $kondisiBagus,
        ]);

        Inventaris::create([
            'nama_barang' => 'Sound System',
            'jumlah_kuantitas' => 2,
            'kondisi_id' => $kondisiBagus,
        ]);

        // 5. Jadwal Pelayanan
        $jadwal1 = JadwalPelayanan::create([
            'nama_ibadah' => 'Ibadah Minggu Pagi',
            'semester' => 'Jan-Jun 2026',
            'tanggal_waktu' => Carbon::now()->next(Carbon::SUNDAY)->setTime(8, 0),
            'lokasi_ibadah' => 'Pusat',
        ]);

        // 6. Pelayan Jadwal
        PelayanJadwal::create([
            'jadwal_id' => $jadwal1->id,
            'jemaat_id' => $j3->id,
            'peran' => 'Pendeta',
        ]);

        PelayanJadwal::create([
            'jadwal_id' => $jadwal1->id,
            'jemaat_id' => $j1->id,
            'peran' => 'Penatua',
        ]);

        // 7. Warta
        Warta::create([
            'judul' => 'Warta Jemaat Minggu Ini',
            'tanggal_terbit' => Carbon::now(),
            'file_path' => 'warta/sample.pdf',
        ]);
    }
}
