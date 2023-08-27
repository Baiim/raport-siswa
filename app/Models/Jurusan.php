<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'kode','namaJurusan'
    ];

    // public function siswa()
    // {
    //     return $this->hasMany(Siswa::class, 'kelas_id');
    // }
}
