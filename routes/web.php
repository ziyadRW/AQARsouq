<?php

use Illuminate\Support\Facades\Route;

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

// Load routes for Listing module
Route::middleware('web')
    ->group(base_path('Modules/Listing/Routes/web.php'));

// Load routes for User module
Route::middleware('web')
    ->group(base_path('Modules/User/Routes/web.php'));
