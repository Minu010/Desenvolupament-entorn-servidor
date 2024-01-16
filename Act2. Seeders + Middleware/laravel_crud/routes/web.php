<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; // Asegúrate de que esta ruta sea correcta

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirección de la ruta raíz a /dashboard si está autenticado, si no, a /login
Route::get('/', function () {
    return redirect('/dashboard');
});

// Define la ruta para mostrar el formulario de inicio de sesión y asígnale el nombre 'login'
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Define la ruta para manejar el envío del formulario de inicio de sesión
Route::post('/login', [LoginController::class, 'login']);

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta del dashboard protegida por el middleware 'auth'
Route::get('/dashboard', function () {
    return view('dashboard'); // Asegúrate de que la vista 'dashboard' exista
})->middleware('auth');

// Rutas CRUD para pokémons con middleware 'admin'
Route::middleware('admin')->group(function () {
    Route::post("/registrar-pokemons", [CrudController::class, "create"])->name("crud.create");
    Route::post("/modificar-pokemons", [CrudController::class, "update"])->name("crud.update");
    Route::get("/eliminar-pokemons-{Id}", [CrudController::class, "delete"])->name("crud.delete");
});