<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::middleware('web')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'auth'])->name('login.store');
    Route::get('signup', [UserController::class, 'create'])->name('user.create');
    Route::post('signup', [UserController::class, 'store'])->name('user.store');
});
