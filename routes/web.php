<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('/categories', CategoryController::class);

    // Sub Categories
    Route::resource('/sub-categories', SubCategoryController::class);
    Route::get('/sub-categories-of-category/{category}', [SubCategoryController::class, 'subCategoriesOfCategory'])->name('subCategoriesOfCategory');

    // Features
    Route::resource('/features', FeatureController::class);

    // Products
    Route::resource('/products', ProductController::class);
});
