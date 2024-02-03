<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\frontendController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/book', 'book')->name('book');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
    Route::middleware(['auth'])->group(function () {
        Route::get('/cart', 'cart')->name('cart');
        Route::post('/addCart', 'addCart')->name('addCart');
        Route::post('/checkout', 'checkout')->name('checkout');
        Route::post('/midtrans_notify', 'midtrans_notify')->name('midtrans_notify');
        Route::get('/midtrans/{id}', 'midtrans')->name('midtrans');
        Route::post('/payment', 'payment')->name('payment');
        Route::post('/payments_finish', 'payments_finish')->name('payments_finish');
        Route::delete('/delete_cart', 'delete_cart')->name('delete_cart');
        Route::post('logout', 'logout')->name('logout');
    });
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
