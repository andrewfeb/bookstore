<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublishersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('login', function(){
    return view('login');
});

Route::post('login', [LoginController::class, 'authenticate'])->name('login');


Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::get('logout', [LoginController::class,'logout'])->name('logout');

    Route::resources([
        'genres' => GenresController::class,
        'publishers' => PublishersController::class,
        'books' => BooksController::class
    ]);
});
