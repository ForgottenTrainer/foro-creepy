<?php

use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [homeController::class, 'index'])->name('index.home');
Route::get('/login', [LoginController::class, 'login'])->name('index.login');
Route::get('/register', [LoginController::class, 'register'])->name('index.register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/posts', [PostController::class, 'index'])->name('index.post');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/tablero/posts/{post}', [PostController::class, 'table'])->name('index.tablero');
Route::get('/usuario/editar/{id}', [homeController::class, 'show'])->name('edit.user');
Route::get('/post/editar/{id}', [PostController::class, 'update'])->name('edit.post');
Route::get('/search', [homeController::class, 'search'])->name('index.search');
Route::get('/usuario-ver/{id}', [ProfileController::class, 'index'])->name('index.profile');
Route::get('/usuario-ver/redes-sociales/{id}', [ProfileController::class, 'create'])->name('create.profile');


Route::post('/posts-create', [PostController::class, 'create'])->name('index.create');
Route::post('/login-validate', [LoginController::class, 'log'])->name('login');
Route::post('/register-create', [LoginController::class, 'registerCreate'])->name('register.create');
Route::post('/comentario/create', [ComentariosController::class, 'store'])->name('comentario.create');
Route::post('/usuario/social-media', [SocialMediaController::class, 'store'])->name('store.social');


Route::put('/post/editar/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::put('/usuario/editar/{id}', [homeController::class, 'update'])->name('update.user');
Route::patch('/usuario/social-media/{id}', [SocialMediaController::class, 'update'])->name('update.social');

Route::delete('/post/eliminar/{id}', [PostController::class, 'destroy'])->name('delete.post');
