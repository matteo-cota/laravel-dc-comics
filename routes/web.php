<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

// Utilizza Route::resource per generare automaticamente tutte le rotte CRUD
Route::resource('comics', ComicController::class);

// Se desideri mantenere la rotta per la home page, puoi fare così:
Route::get('/', [ComicController::class, 'index'])->name('home'); // (Opzionale)