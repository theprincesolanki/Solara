<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Define the route for the home page
Route::get('/', [FrontendController::class, 'index'])->name('home');
