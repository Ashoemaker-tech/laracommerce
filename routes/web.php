<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishListController;
use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/empty', function() { Cart::instance('wishlist')->destroy(); });

Route::post('/cart/towishlist/{product}', [WishListController::class, 'store'])->name('cart.towishlist');
Route::delete('/wishlist/{product}', [WishListController::class, 'destroy'])->name('wishlist.destroy');
Route::post('/wishlist/tocart/{product}', [WishListController::class, 'update'])->name('wishlist.tocart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::view('/thankyou', 'thankyou');