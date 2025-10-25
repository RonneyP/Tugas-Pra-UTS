<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table='dosen';
    protected $fillable=[
        'NIP',
        'Nama',
        'Pendidikan_Terakhir'
    ];

    public function matakuliah(){
        return $this->hasMany(MataKuliah::class);
    }
}
