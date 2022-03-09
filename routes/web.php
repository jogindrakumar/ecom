<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\User\WishlistController;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\User;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Wishlist;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});


//Admin All routes
 Route::middleware(['auth:admin'])->group(function () {

 Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
 Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
 Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('update.change.password');

 // Admin Brand All Routes


Route::get('/brand/view',[BrandController::class,'BrandView'])->name('all.brand');
Route::post('/brand/store',[BrandController::class,'BrandStore'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
Route::post('/brand/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');


  // Admin Category All Routes category

    Route::get('/category/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/category/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/category/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

// Subcategory of all Category

    Route::get('/category/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::post('/category/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
    Route::get('/category/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/category/sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/category/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');

// Sub-Sub-category of all Category

    Route::get('/category/sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/category/subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategory']);
    Route::get('/category/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/category/sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/category/sub/sub/edit/{id}',[SubCategoryController::class,'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/category/sub/sub/update',[SubCategoryController::class,'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/category/sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('subsubcategory.delete');

 
 // Admin Product All Routes

 
Route::get('/product/add',[ProductController::class,'AddProduct'])->name('add-product');
Route::post('/product/store',[ProductController::class,'StoreProduct'])->name('product-store');
Route::get('/product/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
Route::get('/product/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
Route::post('/product/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
Route::post('/product/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
Route::post('/product/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update-product-thumbnail');
Route::get('/product/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
Route::get('/product/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
Route::get('/product/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
Route::get('/product/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');


 // Admin Slider All Routes

 
Route::get('/slider/view',[SliderController::class,'SliderView'])->name('manage-slider');
Route::post('/slider/store',[SliderController::class,'SliderStore'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'SliderEdit'])->name('slider.edit');
Route::post('/slider/update',[SliderController::class,'SliderUpdate'])->name('slider.update');
Route::get('/slider/delete/{id}',[SliderController::class,'SliderDelete'])->name('slider.delete');
Route::get('/slider/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
Route::get('/slider/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');


 });


 // frontend Hindi English route Multi language all routes

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');

// Product details Routes

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// frontend Product Tags Pages

Route::get('/product/tag/{tag}', [IndexController::class, 'TagWishProduct']);

// Subcategory wise data

Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWishProduct']);

// Sub Sub CAtegory wise data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWishProduct']);

// product View model with ajax
Route::get('/product/view/model/{id}', [IndexController::class, 'ProductViewAjax']);

// product  Add to Cart store data with ajax
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

//Get data from  Mini cart  ajax
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

//Get data from  Mini cart and remove 

Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to WishList
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],function(){

    //Get WishList page
Route::get('/wishlist/', [WishlistController::class, 'ViewWishlist'])->name('wishlist');


Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);


Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

});





 Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
       $id = Auth::user()->id;
        $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

// user home routes

Route::get('/',[IndexController::class,'Index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class,'UserChangePassword'])->name('user.change.password');
Route::post('/user/update/password',[IndexController::class,'UserUpdatePassword'])->name('user.update.password');





