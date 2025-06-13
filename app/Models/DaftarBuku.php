<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_katalog',
        'judul_buku',
        'penulis',
        'penerbit',
        'kategori',
        'jumlah_buku',
        'cover_buku',
    ];
}
