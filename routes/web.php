<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// startseite
Route::get('/', function() {
    return view('start' );
});

Route::group([
    'middleware' => 'auth',
    'prefix'    => 'authors',
], function() {
    Route::get('create', [AuthorController::class, 'create'])->name('authors.create');
    Route::get('edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('store', [AuthorController::class, 'store'])->name('authors.store');
    Route::post('update/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('destroy/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});
Route::get('authors', [AuthorController::class, 'index'])->name('authors');
Route::get('authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

Route::group([
    'middleware' => 'auth',
    'prefix'    => 'movies',
], function() {
    Route::get('create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
    Route::post('store', [MovieController::class, 'store'])->name('movies.store');
    Route::post('update/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::get('destroy/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});
Route::get('movies', [MovieController::class, 'index'])->name('movies');
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::group([
    'middleware' => 'auth',
    'prefix'    => 'todos',
], function() {
    Route::get('create', [TodoController::class, 'create'])->name('todos.create');
    Route::get('edit/{todo}', [TodoController::class, 'edit'])->name('todos.edit');
    Route::post('store', [TodoController::class, 'store'])->name('todos.store');
    Route::post('update/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::get('destroy/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
});
Route::get('todos', [TodoController::class, 'index'])->name('todos');
Route::get('todos/{todo}', [TodoController::class, 'show'])->name('todos.show');

// wenn eine route aufgerufen wird, die nicht definiert wurde
Route::fallback(function() {
    $message = 'Diese Route gibt\'s nicht bei mir!';
    return view('errors.message', compact('message'));
});
