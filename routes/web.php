<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApelacionController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/admin/{id}', [AdminController::class, 'index'])->name('index.admin')->middleware(CheckAdmin::class);
Route::get('/admin/forms/{id}', [AdminController::class, 'create'])->name('index.forms')->middleware(CheckAdmin::class);
Route::get('/admin/tables/{id}', [AdminController::class, 'show'])->name('index.table')->middleware(CheckAdmin::class);
Route::get('/admin/reporte/{id}', [AdminController::class, 'report'])->name('index.reportes')->middleware(CheckAdmin::class);


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
Route::get('/apelaciones', [ApelacionController::class, 'index'])->name('index.apelacion');
Route::get('/apelaciones/{id}', [ApelacionController::class, 'create'])->name('apelacion.response');


Route::post('/posts-create', [PostController::class, 'create'])->name('index.create');
Route::post('/login-validate', [LoginController::class, 'log'])->name('login');
Route::post('/register-create', [LoginController::class, 'registerCreate'])->name('register.create');
Route::post('/comentario/create', [ComentariosController::class, 'store'])->name('comentario.create');
Route::post('/usuario/social-media', [SocialMediaController::class, 'store'])->name('store.social');
Route::post('/register-create/admin', [LoginController::class, 'registerAdminCreate'])->name('admin.create');
Route::post('/apelaciones-create', [ApelacionController::class, 'store'])->name('apelacion.create');



Route::middleware(['auth'])->group(function () {
    Route::post('/report/user/{id}', [ReportController::class, 'reportUser'])->name('report.user');
    Route::post('/report/post/{id}', [ReportController::class, 'reportPost'])->name('report.post');
});


Route::put('/post/editar/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::put('/usuario/editar/{id}', [homeController::class, 'update'])->name('update.user');
Route::put('/usuario/bloquear/{id}', [AdminController::class, 'report_user'])->name('report.user');
Route::put('/usuario/desbloquear/{id}', [AdminController::class, 'unlock_user'])->name('report.user.unlock');
Route::put('/apelacion/respuesta/{id}', [ApelacionController::class, 'show'])->name('apelacion.show');

Route::patch('/usuario/social-media/{id}', [SocialMediaController::class, 'update'])->name('update.social');

Route::delete('/post/eliminar/{id}', [PostController::class, 'destroy'])->name('delete.post');
Route::delete('/user/eliminar/{id}', [LoginController::class, 'destroy'])->name('delete.user');