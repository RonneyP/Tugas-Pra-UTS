<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KRSController;
use Illuminate\Support\Facades\Route;

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});
Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('/krs/{mahasiswa}', [KRSController::class, 'index'])->name('krs.index');
Route::post('krs/{mahasiswa}/tambah', [KRSController::class, 'store'])->name('krs.store');
Route::delete('krs/{mahasiswa}/hapus/{matakuliah}', [KRSController::class, 'destroy'])->name('krs.destroy');