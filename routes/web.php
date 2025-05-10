<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ContentController::class, 'index'])->name('home');
Route::get('/genres', [ContentController::class, 'index'])->name('genres');
Route::get('/my-list', [ContentController::class, 'index'])->name('my-list');

Route::view('/privacy', 'index')->name('privacy');
Route::view('/terms', 'index')->name('terms');
Route::view('/support', 'index')->name('support');

