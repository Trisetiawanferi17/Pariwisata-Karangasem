<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    // Nama tabel di database (sesuaikan jika berbeda)
    protected $table = 'wisata';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'kategori',
        'lokasi',
        'harga',
        'jam_buka',
        'deskripsi',
        'gambar',
        'rating',
        'fasilitas',
    ];

    // Casting tipe data
    protected $casts = [
        'fasilitas' => 'array',
        'rating' => 'float',
    ];

    // Relasi ke komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}