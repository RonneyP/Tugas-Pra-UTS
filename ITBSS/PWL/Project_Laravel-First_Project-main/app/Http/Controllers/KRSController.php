<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class KRSController extends Controller
{
    /**
     * Tampilkan daftar mata kuliah yang diambil oleh mahasiswa
     */
    public function index($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::with('matakuliah')->findOrFail($mahasiswaId);
        $matakuliah = Matakuliah::all();

        return view('IndexKRS', compact('mahasiswa', 'matakuliah'));
    }

    /**
     * Tambahkan mata kuliah ke mahasiswa (dengan validasi batas SKS)
     */
    public function store(Request $request, $mahasiswaId)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliah,id',
        ]);

        $mahasiswa = Mahasiswa::with('matakuliah')->findOrFail($mahasiswaId);
        $matakuliah = Matakuliah::findOrFail($request->matakuliah_id);

        $totalSksSekarang = $mahasiswa->totalSks();
        $maxSks = $mahasiswa->maksimal_sks;

        // Cek apakah sudah mengambil matakuliah yang sama
        if ($mahasiswa->matakuliah->contains($matakuliah->id)) {
            return back()->with('error', 'Mata kuliah ini sudah diambil!');
        }

        // Validasi batas maksimal SKS
        if ($totalSksSekarang + $matakuliah->sks > $maxSks) {
            return back()->with('error', 'Total SKS melebihi batas maksimal!');
        }

        // Tambahkan ke tabel pivot
        $mahasiswa->matakuliah()->attach($matakuliah->id);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    /**
     * Hapus mata kuliah dari KRS mahasiswa
     */
    public function destroy($mahasiswaId, $matakuliahId)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);
        $mahasiswa->matakuliah()->detach($matakuliahId);

        return back()->with('success', 'Mata kuliah berhasil dihapus dari KRS!');
    }
}
