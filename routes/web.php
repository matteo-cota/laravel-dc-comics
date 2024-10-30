<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;


Route::resource('comics', ComicController::class);


Route::get('/', [ComicController::class, 'index'])->name('home');