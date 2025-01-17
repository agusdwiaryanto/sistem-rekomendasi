<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';
    protected $fillable = ['nama', 'jenis_wisata', 'fasilitas_wisata', 'latitude', 'longitude']; // Kolom yang dapat diisi
}
