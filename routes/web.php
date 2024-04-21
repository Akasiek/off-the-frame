<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');

Route::prefix('products')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('products.dashboard');
        Route::post('/', [ProductController::class, 'store'])->name('products.create');
        // Multipart Inertia limitations
        Route::post('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.delete');
    });
});

Route::prefix('product-categories')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [ProductCategoryController::class, 'dashboard'])->name('product-categories.dashboard');
        Route::post('/', [ProductCategoryController::class, 'store'])->name('product-categories.create');
        Route::put('/{productCategory}', [ProductCategoryController::class, 'update'])->name('product-categories.update');
        Route::delete('/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('product-categories.delete');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
