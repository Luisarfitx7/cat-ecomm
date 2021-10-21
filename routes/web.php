<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FRONT\FrontController;
use App\Http\Controllers\FRONT\CartController;
use App\Http\Controllers\ADMIN\AdminController;
use App\Http\Controllers\ADMIN\ProductController;
use App\Http\Controllers\ADMIN\UserController;

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


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('typ', [FrontController::class, 'typ'])->name('typ');
Route::get('checkout', [CartController::class, 'cartList'])->name('cart.list');
Route::post('checkout', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/{productName}', [FrontController::class, 'product'])->name('product.show');

Route::prefix('/admin')->middleware(['admin','auth'])->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

Auth::routes();

