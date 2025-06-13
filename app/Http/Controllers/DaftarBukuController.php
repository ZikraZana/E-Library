<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarBuku;

class DaftarBukuController extends Controller
{
    public function debugDaftarBuku()
    {
        $data = DaftarBuku::all();

        dd($data);
    }
}
