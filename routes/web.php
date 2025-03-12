<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EntryController;

Route::get('/', function () {
    $allBooks = Book::all();
    return view('newpg', ['allBooks'=>$allBooks]);
});

Route::get('/all-books', [EntryController::class, 'allBooks'])->name('allBooks');
Route::get('/my-books', [EntryController::class, 'myBooks'])->name('myBooks');

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//entry of books related routes
Route::post('/create-entry', [EntryController::class, 'upload']);
Route::get('/edit-entry/{book}', [EntryController::class, 'loadEditScreen']
)->middleware(AdminMiddleware::class.':admin');
Route::put('/edit-entry/{book}', [EntryController::class, 'updateEntry']);
Route::delete('/delete-entry/{book}', [EntryController::class, 'deleteEntry']);