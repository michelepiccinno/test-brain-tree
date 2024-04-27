<?php

use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/products');
});

/* Route::get('products', [BraintreeController::class, 'token'])->name('products');  */
Route::any('/payment', [BraintreeController::class, 'token'])->name('token');

Route::get('/products', [ProductController::class, 'index']);

Route::any('/list', [BraintreeController::class, 'index'])->name('index');
