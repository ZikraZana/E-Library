<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\DaftarBuku;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Menampilkan wishlist milik user yang sedang login
    public function index()
    {
        $wishlist = Wishlist::with('buku')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('wishlist.index', compact('wishlist'));
    }

    // Menambahkan buku ke wishlist
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:daftar_buku,id',
        ]);

        // Cek apakah sudah ada di wishlist
        $exists = Wishlist::where('user_id', Auth::id())
                          ->where('buku_id', $request->buku_id)
                          ->exists();

        if ($exists) {
            return back()->with('info', 'Buku sudah ada di wishlist.');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
        ]);

        return back()->with('success', 'Buku berhasil ditambahkan ke wishlist.');
    }

    // Menghapus buku dari wishlist
    public function destroy($id)
    {
        $wishlist = Wishlist::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $wishlist->delete();

        return back()->with('success', 'Buku berhasil dihapus dari wishlist.');
    }
}

