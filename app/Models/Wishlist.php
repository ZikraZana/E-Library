<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = [
        'user_id',
        'buku_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function buku(){
        return $this->belongsTo(DaftarBuku::class);
    }
}
