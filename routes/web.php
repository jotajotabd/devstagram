<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/estilos', function () {
    return view('practicas.estilos');
});

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/{user:username}', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');


Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');