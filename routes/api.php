<?php

use App\Http\Controllers\Api\Products\ProductController as ProductsProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Rotta API product index
Route::get('products',[ProductController::class, 'index']);