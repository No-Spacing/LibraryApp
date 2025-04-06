<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;

Route::resource('authors', AuthorsController::class);

Route::resource('books', BooksController::class);

Route::controller(LibraryController::class)->group( function () {
    Route::get('library', 'view')->name('library');
    Route::get('has-many', 'hasMany')->name('has-many');
    Route::get('belongs-to', 'belongsTo')->name('belongs-to');
});