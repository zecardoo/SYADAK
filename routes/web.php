<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\SearchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();


// Route::get('/', function () {
//     $product = Product::all();
//         // return response()->json($product);
//     return view('home.main', compact('product'));
// });


// home
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    // Route::get('/dashborad', 'dashborad')->name('dashborad');
    
});


Route::controller(DashboradController::class)->group(function (){
   Route::get('/dashborad', 'dashborad')->name('dashborad');
   Route::get('/category', 'category')->name('category');
   Route::get('/product', 'product')->name('product');
   Route::get('/users', 'users')->name('users');

});

// Cart
Route::controller(CartController::class)->group(function (){
    Route::get('/cart-show', 'show')->name('cart-show');
    Route::post('/cart-creat', 'store')->name('cart-store');
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/payment', 'create')->name('payment');

    
});

// Category
Route::controller(CategoryController::class)->group(function () {
    // Route::get('/categoryshow', 'index')->name('category.index');
    Route::post('/category/p', 'store')->name('category.store');
    Route::patch('/edit/category/{category}', 'edit')->name('category.edit');
    Route::delete('/delete/category/{category}', 'destroy')->name('category.delete');
});

// Product
Route::controller(ProductController::class)->group(function () {
    // Route::get('/product', 'index')->name('product.index');
    Route::post('/product/p', 'store')->name('product.store');
    Route::get('/product-show/{productId}', 'show')->name('product-show');
    Route::patch('/edit/product/{product}', 'edit')->name('product.edit');
    Route::delete('/delete/product/{prodcut}', 'destroy')->name('product.delete');

    
});

// profile
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('Profile.index');
    Route::patch('/profile/update/{user}', 'update')->name('Profile.update');
    Route::patch('/profile/edit/{user}', 'edit')->name('profile.edit');
    Route::patch('/profile/user/edit/{user}', 'userProfile')->name('profile-user');
    Route::delete('/delete/{user}', 'destroy')->name('profile.destroy');
});