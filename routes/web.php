<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/produk');
Route::resource('produk', ProdukController::class);

Route::get('/about', function () {
     return view('about'); });
     
Route::resource('booking', BookingController::class);