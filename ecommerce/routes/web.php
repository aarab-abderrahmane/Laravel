<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\Admin\ProductController; 

use App\Http\Controllers\CartController ; 

use App\Http\Controllers\OrderController ; 

use App\Http\Controllers\Shop\CatalogController ; 

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


Route::middleware(['auth' , "role:admin"])->prefix("admin")->group(function(){
        Route::get('/products' ,ProductController::class.'@index' )->name('admin.products.index') ; 
        Route::get('/products/create' , ProductController::class.'@create')->name('admin.products.create') ; 
        Route::post('/products' , [ProductController::class , "store"])->name('admin.products.store') ; 

        Route::get('/products/{id}/edit' , [ProductController::class , "edit"])->name('admin.products.edit') ; 
        Route::put('/products/{product}' , [ProductController::class , "update"])->name('admin.products.update') ; 
        Route::delete('/products/{product}' , [ProductController::class , "destroy"])->name('admin.products.destroy');

        Route::get('/orders', [\App\Http\Controller\Admin\OrderController::class , "index"])->name('admin.orders.index') ; 
        Route::patch('/orders/{order}/status' , [\App\Http\Controller\Admin\OrderController::class , "updateStatus"])->name('admin.orders.status');
})
;


// Route::resource('shop',\App\Http\Controllers\ProductController::class) ; 




Route::prefix('cart')->name('cart.')->group(function(){

    Route::get('/'  , [CartController::class , "index"])->name('index');
    Route::post('/{product}/add'  , [CartController::class , "add"])->name('add');
    Route::patch('/{id}/update'  , [CartController::class , "update"])->name('update') ; 
    Route::delete('/{id}/remove' , [CartController::class ,"remove"])->name('remove') ; 

});

    
Route::middleware(['auth' , "role:customer"])->group(function(){

        Route::get('/my-orders' , [OrderController::class , "index"])->name('orders.index')  ; 
        Route::get('/my-orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/my-orders', [OrderController::class, 'store'])->name('orders.store');

});

// Catalog : 

Route::get('/shop', [CatalogController::class, 'index'])->name('shop.catalog');

// product detail 
Route::get('/product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('shop.product');

require __DIR__.'/auth.php';
