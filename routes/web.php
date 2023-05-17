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
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Listado de Fotos
Route::get('/fotos', [\App\Http\Controllers\FotosController::class, 'index'])->name('fotos');


//Modificar foto                                                           //Llamada al método
Route::get('/fotos/modificar/{id}', [\App\Http\Controllers\FotosController::class, 'show'])->name('fotos.show');
Route::post('/fotos/modificar/{id}', [\App\Http\Controllers\FotosController::class, 'edit'])->name('fotos.edit'); 

//Cambiar por el resource
