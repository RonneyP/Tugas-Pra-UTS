<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MataKuliahMahasiswa extends Model
{
    protected $table='mata_kuliah_mahasiswas';
    protected $fillable=[
        'mahasiswa_id',
        'matakuliah_id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
