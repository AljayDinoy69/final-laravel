<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/category/{category}', [NewsController::class, 'showCategory'])->name('category.show');
Route::resource('news', NewsController::class);
