<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::resources([
    'genres' => GenresController::class,
    'publishers' => PublishersController::class,
    'books' => BooksController::class
]);
