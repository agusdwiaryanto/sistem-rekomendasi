<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailwisata extends Model
{
    use HasFactory;

    // Menonaktifkan penggunaan timestamps
    public $timestamps = false;
    
    // Menentukan nama tabel
    protected $table = 'detail_wisata';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama_tempat',   // Nama tempat wisata
        'rating',        // Rating tempat wisata
        'jumlah_ulasan', // Jumlah ulasan
        'foto_url',      // URL foto tempat wisata
        'deskripsi'      // Deskripsi tempat wisata
    ];
}
