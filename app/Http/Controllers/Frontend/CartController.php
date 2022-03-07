<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    //

    public function AddToCart(Request $request , $id){


        $product = Product::findOrFail($id);
    
        if ($product->discount_price == NULL) {
        
            Cart::add([
            'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
                ]);

                return response()->json(['success'=> 'successfully Added in your Cart']);
        } else {
            
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
                ]);
                 return response()->json(['success'=> 'successfully Added in your Cart']);
        }
        

    }


     // Mini Cart Section
    public function AddMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round((int)$cartTotal),

    	));
    } // end method 

 // Mini Cart Remove  Section
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);

    }// end method 


    // Add to wishlist method

    public function AddToWishlist(Request $request, $product_id){

        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

            ]);
             return response()->json(['success' => 'your wishlist product Added successfully ']);
           
        } else {
             return response()->json(['error' => ' Login First Your ACCOUNT !! Your are not Login ']);
        }
        

    }// end method
}
