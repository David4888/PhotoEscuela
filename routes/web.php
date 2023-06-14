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

Route::get('/', function () {
    return view('welcome2');
})->name('welcome2');
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Listado de Fotos
Route::get('/fotos', [\App\Http\Controllers\FotosController::class, 'index'])->name('fotos');

//Crear foto
Route::get('/fotos/crear', [\App\Http\Controllers\FotosController::class, 'create'])->name('fotos.create'); //Muestra formulario
Route::post('/fotos/crear', [\App\Http\Controllers\FotosController::class, 'store'])->name('fotos.store'); //Crea pelicula

//Modificar foto                                                           //Llamada al método
Route::get('/fotos/modificar/{id}', [\App\Http\Controllers\FotosController::class, 'show'])->name('fotos.show');
Route::post('/fotos/modificar/{id}', [\App\Http\Controllers\FotosController::class, 'edit'])->name('fotos.edit'); 

//Eliminar foto
Route::get('/fotos/borrar/{id}', [\App\Http\Controllers\FotosController::class, 'destroy'])->name('fotos.eliminar'); 

//Carrusel
Route::get('/fotos/carrusel', [\App\Http\Controllers\FotosController::class, 'carrusel'])->name('fotos.carrusel');

//Contacto
Route::get('contacto', [\App\Http\Controllers\ContactaController::class, 'index'])->name('contacto.index');
Route::post('contacto', [\App\Http\Controllers\ContactaController::class, 'store'])->name('contacto.store');

