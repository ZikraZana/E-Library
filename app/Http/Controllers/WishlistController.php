<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use App\Models\DaftarBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('user', 'buku')->where('user_id', Auth::id())->get();
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        return view('users.wishlist.wishlist', compact('wishlist', 'pengguna', 'buku'));
    }

    public function store(Request $request)
    {
        Wishlist::create($request->all());

        return redirect()->back()->with('success_wishlist', 'Buku berhasil ditambahkan ke wishlist.');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();

        return redirect()->back()->with('destroy_wishlist', 'Buku berhasil dihapus dari wishlist.');
    }
}
