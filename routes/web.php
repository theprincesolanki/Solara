<?php

use Illuminate\Support\Facades\Route;

/* frontend */
use App\Http\Controllers\AdminAuth\ProfileController;
use App\Http\Controllers\UserAuth\FrontendController;

/* backend */
use App\Http\Controllers\AdminAuth\DashboardController;
use App\Http\Controllers\AdminAuth\SiteSettingController;
use App\Http\Controllers\AdminAuth\EnquiryController;
use App\Http\Controllers\AdminAuth\BannerController;
use App\Http\Controllers\AdminAuth\ServiceController;

/* frontend */

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::post('/contact/submit', [FrontendController::class, 'contact_submit'])->name('contact.submit');




/* backend */

/* varified jab email verified hoga tab access hoga */
Route::middleware(['auth', 'verified'])->prefix('pe-secure-admin/')->name('backend.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::post('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::delete('enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    Route::resource('banners', BannerController::class)->names('banners');
});

require __DIR__ . '/auth.php';
