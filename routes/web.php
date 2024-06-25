<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index/Index');
});

// Listings routes with authentication
Route::middleware('auth')->group(function () {
    Route::resource('listings', ListingController::class)->only(['create', 'store', 'edit', 'update']);
});

// Listings routes without authentication
Route::resource('listings', ListingController::class)->only(['index', 'show']);

// Authentication routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('signup', [UserAccountController::class, 'create'])->name('user.create');
Route::post('signup', [UserAccountController::class, 'store'])->name('user.store');

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::resource('listings', RealtorListingController::class)->only(['index', 'destroy']);
});