<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\POSController;

// POS (MAIN PAGE)
Route::get('/', [POSController::class,'index'])->name('pos.index');

// PRODUCT MANAGEMENT (CRUD)
Route::resource('products', ProductController::class);

// CHECKOUT
Route::post('/checkout',[POSController::class,'checkout'])->name('pos.checkout');
Route::get('/receipt/{id}',[POSController::class,'receipt'])->name('pos.receipt');

Route::get('/history', [POSController::class,'history']);
Route::delete('/history/{id}', [POSController::class,'destroy'])->name('history.delete');