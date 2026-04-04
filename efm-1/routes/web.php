<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController ; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/etudiant' ,[EtudiantController::class , "index"] );
