<?php

use App\Http\Controllers\CrudController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/",[CrudController::class,"index"])->name("crud.index");

//ruta para añadir pokémons
Route::post("/registrar-pokémons",[CrudController::class,"create"])->name("crud.create");

//ruta para modificar pokémons
Route::post("/modificar-pokémons",[CrudController::class,"update"])->name("crud.update");

//ruta para eliminar pokémon
Route::get("/eliminar-pokémons-{Id}",[CrudController::class,"delete"])->name("crud.delete");