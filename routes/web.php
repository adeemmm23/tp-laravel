<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

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

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/store', [FilmController::class, 'create'])->name('films.create');
Route::post('/films/store', [FilmController::class, 'store'])->name('films.store');
Route::get('/films/delete/{id}', [FilmController::class, 'destroy'])->name('films.delete');
Route::post('/films/edit/', [FilmController::class, 'update'])->name('films.update');
Route::get('/films/edit/{id}', [FilmController::class, 'edit'])->name('films.edit');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
