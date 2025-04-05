<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProjectMediaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceIconController;

use App\Http\Controllers\Admin\HomePageController as FrontHomePageController;
use App\Http\Controllers\Admin\ServiceController as FrontServiceController;
use App\Http\Controllers\Admin\PortfolioController as FrontPortfolioController;

// Frontend Rotaları
Route::get('/', [FrontHomePageController::class, 'index'])->name('home');
Route::get('/services', [FrontServiceController::class, 'index'])->name('services');
Route::get('/portfolios', [FrontPortfolioController::class, 'index'])->name('portfolios');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('portfolios', App\Http\Controllers\Admin\PortfolioController::class);
    Route::resource('project-media', App\Http\Controllers\Admin\ProjectMediaController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('service-icons', App\Http\Controllers\Admin\ServiceIconController::class);
    Route::resource('home-pages', App\Http\Controllers\Admin\HomePageController::class);
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
