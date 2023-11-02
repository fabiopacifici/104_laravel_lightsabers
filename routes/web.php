<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guests\PageController;
use App\Http\Controllers\Admin\SabersController;
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





// Versione compatta Rotte di tipo risorsa per gestire completamente il modello LightSaber
Route::resource('admin/lightsabers', SabersController::class);


/* Versione estesa 👆 is equal to 👇
// READ
Route::get('/lightsabers', [LightSaberController::class, 'index'])->name('sabers.index');
//CRETE
Route::get('/lightsabers/create', [LightSaberController::class, 'create'])->name('sabers.create');
//CREATE
Route::post('/lightsabers', [LightSaberController::class, 'store'])->name('sabers.store');
//READ
Route::get('/lightsabers/{lightsaber}', [LightSaberController::class, 'show'])->name('sabers.show');

//UPDATE
Route::get('/lightsabers/{lightsaber}/edit', [LightSaberController::class, 'edit'])->name('sabers.edit');

Route::put('/admin/lightsabers/{lightsaber}', [LightSaberController::class, 'update'])->name('sabers.update');

// DELETE
Route::delete('/admin/lightsabers/{lightsaber}', [LightSaberController::class, 'destroy'])->name('sabers.destroy');
*/
