<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class,'post'])->name('post');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/contact', [ContactUsController::class,'index'])->name('contact');
Route::post('/contact', [ContactUsController::class,'send'])->name('contact.send');

/**
 * socialite auth
 */

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

// Route Admin

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', isAdmin::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.berita');
    Route::get('/dashboard/post/create', [DashboardController::class, 'add'])->name('berita.add');
    Route::get('/dashboard/post/preview', [DashboardController::class, 'preview'])->name('berita.preview');
    Route::get('/dashboard/post/{slug}', [DashboardController::class, 'view'])->name('berita.view');
    Route::get('/dashboard/post/{slug}/edit', [DashboardController::class, 'edit'])->name('berita.edit');
    Route::post('/dashboard/post', [PostController::class, 'store'])->name('berita.store');
    Route::put('/dashboard/post/{post}', [PostController::class, 'update'])->name('berita.update');
    Route::delete('/dashboard/post/{id}', [PostController::class, 'destroy'])->name('berita.delete');
    Route::get('/dashboard/messages', [DashboardController::class, 'messages'])->name('pesan.view');
    Route::delete('/dashboard/message/{message}', [ContactUsController::class, 'destroy'])->name('pesan.delete');
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.view');
    Route::put('/dashboard/user/{id}/grant-admin', [UserController::class, 'grantAdmin'])->name('user.grant-admin');
    Route::put('/dashboard/user/{id}/release-admin', [UserController::class, 'releaseAdmin'])->name('user.release-admin');
});
