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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::post('locations/media', [\App\Http\Controllers\Admin\LocationController::class,'storeMedia'])->name('locations.storeMedia');
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class);
    Route::post('event_types/media', [\App\Http\Controllers\Admin\EventTypeController::class,'storeMedia'])->name('event_types.storeMedia');
    Route::resource('event_types', \App\Http\Controllers\Admin\EventTypeController::class);
    Route::post('venues/media', [\App\Http\Controllers\Admin\VenueController::class,'storeMedia'])->name('venues.storeMedia');
    Route::resource('venues', \App\Http\Controllers\Admin\VenueController::class);
});
