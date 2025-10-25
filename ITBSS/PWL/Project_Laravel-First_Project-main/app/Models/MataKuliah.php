<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliah';
    public $timestamps = true; 

    protected $fillable = [
        'kodemk',
        'namamk',
        'jurusan',
        'dosen_id',
        'sks',
    ];

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

     public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mata_kuliah_mahasiswas', 'mahasiswa_id', 'matakuliah_id');
    }
}
