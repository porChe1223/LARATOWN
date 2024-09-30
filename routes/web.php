<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search');
    Route::get('/shops/thanks', [ShopController::class, 'thanks'])->name('shops.thanks');
    Route::resource('shops', ShopController::class);
    Route::post('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/addToCart', [CartController::class, 'addToOrder'])->name('order.create');
    Route::get('cart', [CartController::class, 'index'])->name('shops.cart');
});

require __DIR__.'/auth.php';
