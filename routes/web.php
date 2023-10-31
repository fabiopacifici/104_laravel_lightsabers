<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guests\PageController;
use App\Http\Controllers\Admin\LightSaberController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/lightsabers', [PageController::class, 'lightsabers'])->name('guests.lightsabers');
Route::get('/lightsabers/{lightsaber}', [PageController::class, 'showLightsabers'])->name('guests.lightsabers.show');


Route::resource('admin/lightsabers', LightSaberController::class);
