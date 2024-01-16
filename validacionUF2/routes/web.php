<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;

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
Route::get('/alumno', [AlumnoController::class, 'index'])->name('alumno.index');
Route::get('/alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::post('/alumno/store', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('/alumno/edit/{alumno}', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('/alumno/update/{alumno}', [AlumnoController::class, 'update'])->name('alumno.update');
Route::get('/alumno/show/{alumno}', [AlumnoController::class, 'show'])->name('alumno.show');
Route::delete('/alumno/destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('alumno.destroy');

Route::resource('/curso',CursoController::class);