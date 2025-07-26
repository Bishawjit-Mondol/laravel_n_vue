<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/', 'index');
    Route::post('/store', 'store')->name('products.store');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');

//    Route::get('/create', 'create')->name('products.create');
//    Route::get('/{product}', 'show')->name('products.show');
//    Route::get('/{product}/edit', 'edit')->name('products.edit');
//    Route::put('/{product}', 'update')->name('products.update');
//    Route::delete('/{product}', 'destroy')->name('products.destroy');
});
