<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
    //

    public function Index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hotdeals = Product::where('hot_deal',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $specialoffers = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();
        $skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
         $skip_category_1 = Category::skip(1)->first();
    	$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();
        $skip_brand_1 = Brand::skip(1)->first();
    	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

       return view('frontend.index',compact('categories','sliders','products','featured','hotdeals','specialoffers',
       'special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
    }

    // user logout 

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

      public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));

    }

      public function UserProfileStore(Request $request){
       
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;

        }
           
        $data->save();
         $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('dashboard')->with($notification);


    }


    public function UserChangePassword(){
         $user =  User::find(Auth::user()->id);
    return view('frontend.profile.user_change_password',compact('user'));
    }

     
    public function UserUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
             'password' => 'required|confirmed',

        ]);
        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $user =  User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
        



    }



    // product details function 
     public function ProductDetails($id,$slug){
         $product = Product::findOrFail($id);
         $multiImag = MultiImg::where('product_id',$id)->get();
         return view('frontend.product.product_details',compact('product','multiImag'));
     }



     public function TagWishProduct($tag){
         $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->get();
         $categories = Category::orderBy('category_name_en','ASC')->get();
         return view('frontend.tags.tags_view',compact('products','categories'));
     }
}
