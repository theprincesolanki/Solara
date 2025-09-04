<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth\ProfileController;
use App\Http\Controllers\UserAuth\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/products', [FrontendController::class, 'products'])->name('products');




// varified jab email verified hoga tab access hoga
Route::get('/pe-secure-admin/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->prefix('pe-secure-admin/')->name('backend.')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
