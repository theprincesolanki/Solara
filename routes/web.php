<?php

use Illuminate\Support\Facades\Route;

/* frontend */
use App\Http\Controllers\AdminAuth\ProfileController;
use App\Http\Controllers\UserAuth\FrontendController;

/* backend */
use App\Http\Controllers\AdminAuth\DashboardController;
use App\Http\Controllers\AdminAuth\SiteSettingController;



/* frontend */
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/products', [FrontendController::class, 'products'])->name('products');



/* backend */

/* varified jab email verified hoga tab access hoga */
Route::middleware(['auth', 'verified'])->prefix('pe-secure-admin/')->name('backend.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::post('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');
});

require __DIR__.'/auth.php';
