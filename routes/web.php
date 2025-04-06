<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProjectMediaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceIconController;

use App\Http\Controllers\Admin\ServiceController as FrontServiceController;
use App\Http\Controllers\Admin\PortfolioController as FrontPortfolioController;

Route::get('/services', [FrontServiceController::class, 'index'])->name('services');
Route::get('/portfolios', [FrontPortfolioController::class, 'index'])->name('portfolios');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('portfolios', App\Http\Controllers\Admin\PortfolioController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('service-icons', App\Http\Controllers\Admin\ServiceIconController::class);
    Route::resource('about', App\Http\Controllers\Admin\AboutController::class);
    Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
});

// Frontend Routes
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
Route::resource('services', App\Http\Controllers\Frontend\ServiceController::class)->only(['index', 'show']);
Route::resource('portfolio', App\Http\Controllers\Frontend\PortfolioController::class)->only(['index', 'show']);
Route::resource('team', App\Http\Controllers\Frontend\TeamController::class)->only(['index', 'show']);
Route::resource('partners', App\Http\Controllers\Frontend\PartnerController::class)->only(['index', 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
