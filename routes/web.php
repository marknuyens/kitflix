<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ContentController;


Route::get('/', [ContentController::class, 'home'])->name('home');
Route::get('/genres/{genre?}', [ContentController::class, 'genres'])->name('genres');

Route::middleware('auth')->group(function() {
    Route::get('/my-list', [ContentController::class, 'my_list'])->name('my-list');
});

Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');

// redirects after logging in using Fortify (temp fix)
Route::get('home', fn() => Redirect::to('/'));