<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Define the route for the home page
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
