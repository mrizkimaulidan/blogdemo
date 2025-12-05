<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('posts.index'));
Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::get('tes', function () {
    return 'tes';
});
