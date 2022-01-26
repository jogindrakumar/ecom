<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\User;


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
})->name('dashboard');

//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});


//Admin All routes

 Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
 Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
 Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('update.change.password');

 // Admin Brand All Routes

 Route::prefix('brand')->group(function(){
Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');


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





