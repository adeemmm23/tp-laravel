<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Controller;

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
Route::get('films/categorie/{nom}', [FilmController::class, 'categorie'])->name('films.categorie');
Route::get('films/search', [FilmController::class, 'search'])->name('films.search');
Route::resource('films', FilmController::class);
Route::get('/', [Controller::class, 'index'])->name('index');