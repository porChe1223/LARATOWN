<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
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
    Route::resource('shops', ShopController::class);
    Route::post('/shops/{shop}/cart', [CartController::class, 'store'])->name('shops.addCart');
    Route::delete('/shops/{shop}/cart', [CartController::class, 'destroy'])->name('shops.removeCart');
});

require __DIR__.'/auth.php';
