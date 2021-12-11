<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class);
    Route::resource('event_types', \App\Http\Controllers\Admin\EventTypeController::class);
    Route::resource('venues', \App\Http\Controllers\Admin\VenueController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
