<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama', 'jenisKelamin', 'tanggalLahir', 'phone', 'nip', 'email', 'alamat', 'photo', 'user_id',
    ];

    // Relationship dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}