<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function debugPeminjaman()
    {
        $data = Peminjaman::all();

        dd($data);
    }
}
