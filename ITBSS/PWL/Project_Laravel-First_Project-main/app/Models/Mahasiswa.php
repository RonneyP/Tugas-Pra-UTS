<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    public $timestamps = false; // Eloquent Laravel secara otomatis menambahkan kolom created_at dan updated_at setiap kali melakukan insert atau update.

    protected $fillable = [
        'NIM',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'angkatan',
        'maksimal_sks'
    ];

     public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'mata_kuliah_mahasiswas', 'mahasiswa_id', 'matakuliah_id');
    }

    public function totalSks()
    {
        return $this->matakuliah->sum('sks');
    }

    protected $table = 'table_mahasiswa';
}
