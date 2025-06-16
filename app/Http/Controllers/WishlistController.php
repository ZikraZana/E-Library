<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use App\Models\DaftarBuku;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('user', 'buku')->get();
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        return view('users.wishlist.wishlist', compact('wishlist', 'pengguna', 'buku'));
    }

    public function store(Request $request)
    {
        Wishlist::create($request->all());
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();

        return redirect()->back();
    }
}
