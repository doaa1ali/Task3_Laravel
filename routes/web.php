<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//master....
Route::get('/', function () {
    return view('Layout.master');
})->name('home');


//books....
Route::get('book/create', [BookController::class, 'create'])->name('book.create');
Route::post('book/store', [BookController::class, 'store'])->name("store");
Route::get('book/success', [BookController::class, 'success'])->name('book-success');
Route::get('book/index', [BookController::class, 'index'])->name('book.index');
Route::get('book/search', [BookController::class, 'search'])->name('book.search');
Route::get('book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('book/edit/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('book/delete/{book}', [BookController::class, 'Delete'])->name('book.Delete');
Route::get('book/show/{id}', [BookController::class, 'show'])->name('book.show');


//authors....
Route::get('author/index', [AuthorController::class, 'index'])->name('author.index');
Route::get('author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('author/store', [AuthorController::class, 'store'])->name("author.store");
Route::get('author/search', [AuthorController::class, 'search'])->name('author.search');
Route::get('author/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('author/edit/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('author/delete/{author}', [AuthorController::class, 'destroy'])->name('author.delete');
Route::get('author/show/{id}', [AuthorController::class, 'show'])->name("author.show");



//categories....
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name("category.store");
Route::get('category/search', [CategoryController::class, 'search'])->name('category.search');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('category.show');






