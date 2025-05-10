<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ContentController;


Route::get('/', [ContentController::class, 'index'])->name('home');
Route::get('/genres/{genre?}', [ContentController::class, 'index'])->name('genres');
Route::get('/my-list', [ContentController::class, 'index'])->name('my-list');

Route::view('/privacy', 'index')->name('privacy');
Route::view('/terms', 'index')->name('terms');
Route::view('/support', 'index')->name('support');

// redirects after logging in using Fortify (temp fix)
Route::get('home', fn() => Redirect::to('/'));