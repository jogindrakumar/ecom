<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    //
    public function ViewWishlist(){
        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    }
}
