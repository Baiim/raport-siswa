<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama', 'jenisKelamin', 'tanggalLahir', 'phone', 'nis', 'email', 'alamat', 'photo', 'user_id', 'orangTua', 'kelas_id'
    ];

    // Relationship dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
