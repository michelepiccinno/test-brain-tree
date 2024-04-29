<?php

use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/products');
});

/* Route::get('products', [BraintreeController::class, 'token'])->name('products');  */

Route::any('/payment', [BraintreeController::class, 'token'])->name('token');

Route::view('/oktransaction', 'oktransaction')->name('paymentSuccess');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::any('/list', [BraintreeController::class, 'index'])->name('index');
