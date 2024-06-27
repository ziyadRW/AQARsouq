<?php

use Illuminate\Support\Facades\Route;
use Modules\Listing\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('listings', ListingController::class)->except(['create', 'store', 'edit', 'update']);
Route::middleware('auth')->group(function () {
    Route::resource('listings', ListingController::class)->only(['create', 'store', 'edit', 'update']);
});