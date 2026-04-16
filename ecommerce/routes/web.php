<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\Admin\ProductController; 

use App\Http\Controllers\CartController ; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->prefix("admin")->group(function(){
        Route::get('/products' ,ProductController::class.'@index' )->name('admin.products.index') ; 
        Route::get('/products/create' , ProductController::class.'@create')->name('admin.products.create') ; 
        Route::post('/products' , [ProductController::class , "store"])->name('admin.products.store') ; 

        Route::get('/products/{id}/edit' , [ProductController::class , "edit"])->name('admin.products.edit') ; 
        Route::put('/products/{product}' , [ProductController::class , "update"])->name('admin.products.update') ; 
        Route::delete('/products/{product}' , [ProductController::class , "destroy"])->name('admin.products.destroy');
})
;


Route::resource('shop',\App\Http\Controllers\ProductController::class) ; 


Route::get('/cart'  , [CartController::class , "index"])->name('cart.index');
Route::post('/cart/{product}'  , [CartController::class , "add"])->name('cart.add');


require __DIR__.'/auth.php';
