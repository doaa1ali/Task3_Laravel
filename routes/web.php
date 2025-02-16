<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
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
Route::get('book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('book/edit/{id}', [BookController::class, 'update'])->name('book.update');
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


//students....
Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name("student.store");
Route::get('student/search', [StudentController::class, 'search'])->name('student.search');
Route::get('student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/edit/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
Route::get('student/show/{student}', [StudentController::class, 'show'])->name('student.show');




