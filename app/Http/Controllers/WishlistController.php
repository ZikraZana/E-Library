<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function debugWishlist()
    {
        $data = Wishlist::all();

        dd($data);
    }
}
