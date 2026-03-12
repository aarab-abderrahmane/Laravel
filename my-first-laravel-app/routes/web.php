<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController ; 

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/blog' , [BlogController::class , 'index']);
// Route::get('/blog/{id}' , [BlogController::class , "show"]) ; 



Route::get('/mouad' , function (){

    return "hello worod ! ";

});


Route::get('/blog' , [BlogController::class , "index"] );

// Route::get('/blog/{id}' ,[BlogController::class , "show"]);

Route::get('/blog/create' , [BlogController::class , "create"]);
Route::post('/blog/store', [BlogController::class , "store"]);

// Route::post('/mouad' , function (){

// return "<h1>mouad</h1>" ; 
// });