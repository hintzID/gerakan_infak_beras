<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama_anggota',
        'alamat',
        'email',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        // tambahkan kolom lain yang diperlukan di sini
    ];
}
