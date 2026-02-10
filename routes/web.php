<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\AccommodationController as AdminAccommodationController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/penginapan', [HomeController::class, 'accommodation'])->name('accommodation');
Route::get('/artikel', [HomeController::class, 'articles'])->name('articles');
Route::get('/artikel/{slug}', [HomeController::class, 'articleDetail'])->name('article.detail');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin Routes (Protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // 🔥 ACCOMMODATION IMAGE DELETE HARUS DI ATAS
    Route::delete('accommodation-image/{id}',
        [AdminAccommodationController::class, 'deleteImage'])
        ->name('accommodation.image.delete');

    // Accommodation Management
    Route::resource('accommodation', AdminAccommodationController::class);

    // Gallery Management
    Route::resource('gallery', AdminGalleryController::class);

    // Article Management
    Route::resource('article', AdminArticleController::class);
    Route::post('article/{article}/toggle-publish',
        [AdminArticleController::class, 'togglePublish'])
        ->name('article.toggle-publish');
});
