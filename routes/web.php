<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return view('home', ['posts' => Post::all()]);
    }
    return redirect()->route('user.login');
})->name('home');



Route::get('/login', function () {
    return view('user.login');
})->name('user.login');
Route::get('/register', function () {
    return view('user.register');
})->name('user.register');



Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');


Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');

Route::post('/post', [PostController::class, 'create'])->name('post.create');
Route::delete('/post/{id}', [PostController::class, 'delete'])->name('post.delete');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
