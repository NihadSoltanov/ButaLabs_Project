<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
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
Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::resource('services', App\Http\Controllers\Frontend\ServiceController::class)->only(['index', 'show']);
Route::resource('portfolio', App\Http\Controllers\Frontend\PortfolioController::class)->only(['index', 'show']);
Route::resource('team', App\Http\Controllers\Frontend\TeamController::class)->only(['index', 'show']);
Route::resource('partners', App\Http\Controllers\Frontend\PartnerController::class)->only(['index', 'show']);
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'submit'])->name('contact.submit');


require __DIR__.'/auth.php';
