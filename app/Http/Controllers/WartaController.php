<?php

namespace App\Http\Controllers;

use App\Models\Warta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WartaController extends Controller
{
    /**
     * Tampilkan daftar warta jemaat (Admin Area).
     */
    public function index()
    {
        $wartas = Warta::orderBy('tanggal_terbit', 'desc')->paginate(10);
        return view('admin.warta.index', compact('wartas'));
    }

    /**
     * Form tambah warta baru.
     */
    public function create()
    {
        return view('admin.warta.create');
    }

    /**
     * Simpan warta baru ke database & storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'tanggal_terbit' => 'required|date',
            'file_warta' => 'required|file|mimes:pdf', // Sesuai permintaan: PDF tanpa batasan limit di script (limit diatur php.ini)
        ]);

        $file = $request->file('file_warta');
        $filename = 'warta-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('warta', $filename, 'public');

        Warta::create([
            'judul' => $request->judul,
            'tanggal_terbit' => $request->tanggal_terbit,
            'file_path' => $filename,
        ]);

        return redirect()->route('warta.index')->with('success', 'Warta Jemaat berhasil diterbitkan!');
    }

    /**
     * Hapus warta jemaat.
     */
    public function destroy(Warta $wartum) // Variabel otomatis dari resource route 'warta' menjadi $wartum
    {
        // Hapus file fisik
        if ($wartum->file_path) {
            Storage::disk('public')->delete('warta/' . $wartum->file_path);
        }

        $wartum->delete();

        return redirect()->route('warta.index')->with('success', 'Warta Jemaat berhasil dihapus!');
    }

    /**
     * HALAMAN PUBLIK: Daftar warta untuk jemaat unduh.
     */
    public function publicIndex()
    {
        $wartas = Warta::orderBy('tanggal_terbit', 'desc')->paginate(12);
        return view('warta_publik', compact('wartas'));
    }
}
