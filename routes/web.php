<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/', [ProductController::class, 'frontend_index'])->name('frontend_index');
Route::get('/product_detail/{id}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::post('/add_cart/{id}', [ProductController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [ProductController::class, 'show_cart'])->name('show_cart');
Route::get('/delete_cart/{id}', [ProductController::class, 'delete_cart'])->name('delete_cart');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');


Route::get('/dashboard', [HomeController::class, 'Premium'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//Admin Category Pages
Route::get('/read_category', [CategoryController::class, 'read_category'])->name('read_category');
Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
Route::post('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
Route::post('/create_category', [CategoryController::class, 'create_category'])->name('create_category');

//Admin Product Pages
Route::get('/read_product', [ProductController::class, 'read_product'])->name('read_product');
Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/create_product', [ProductController::class, 'create_product'])->name('create_product');
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::post('/update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

//Admin Order Pages
Route::get('/read_order', [AdminController::class, 'read_order'])->name('read_order');
Route::get('/order_detail/{id}', [AdminController::class, 'order_detail'])->name('order_detail');
Route::get('/order_delivery/{id}', [AdminController::class, 'order_delivery'])->name('order_delivery');
Route::get('/order_pending/{id}', [AdminController::class, 'order_pending'])->name('order_pending');
Route::get('/delete_order/{id}', [AdminController::class, 'delete_order'])->name('delete_order');

//Admin user role
Route::get('/read_user', [AdminController::class, 'read_user'])->name('read_user');
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->name('delete_user');
});

require __DIR__.'/auth.php';
