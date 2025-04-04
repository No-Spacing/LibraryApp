<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibraryController;

Route::controller(AuthorController::class)->group( function () {
    Route::get('/authors', 'view')->name('authors');
    Route::post('/create-author', 'create')->name('create-author');
    Route::post('/update-author', 'update')->name('update-author');
    Route::get('/delete-author/{id}', 'delete')->name('delete-author');
});

Route::controller(BookController::class)->group( function () {
    Route::get('/books', 'view')->name('books');
    Route::post('/post-book', 'create')->name('post-book');
    Route::post('/update-book', 'update')->name('update-book');
    Route::get('/delete-book/{id}', 'delete')->name('delete-book');
});

Route::controller(LibraryController::class)->group( function () {
    Route::get('library', 'view')->name('library');
});