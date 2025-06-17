<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBuku extends Model
{
    use HasFactory;

    protected $table =  'daftar_buku';
    
    protected $fillable = [
        'no_katalog',
        'judul_buku',
        'penulis',
        'penerbit',
        'kategori',
        'jumlah_buku',
        'cover_buku',
    ];

    public function buku()
    {
        return $this->belongsTo(DaftarBuku::class, 'buku_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }
}
