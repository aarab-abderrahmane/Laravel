<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController  ; 
use App\Http\Controllers\CartController  ; 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products' , ProductController::class ) ; 


Route::get('/cart' , [CartController::class , "index"]) ; 
Route::post('/cart' , [CartController::class , "store"]) ; 

Route::patch('/cart/{id}/increment' , [CartController::class , "increment"] )->name('cart.increment') ; 
Route::patch('/cart/{id}/decrement' , [CartController::class  , "decrement"] )->name('cart.decrement')  ; 