<?php
use Illuminate\Support\Facades\Route;
Use App\http\Controllers\Admin\AdminController;
Use App\http\Controllers\Admin\UserController;
Use App\http\Controllers\Admin\FotosController;


Route::group(['middleware' => ['can:admin']], function () {
    Route::get('/',[AdminController::class,'index']);
    Route::get('/list-users',[AdminController::class,'list_users']); 
    Route::get('/list-fotos',[AdminController::class,'list_fotos']);
    Route::resource('users',UserController::class);
    Route::resource('admin/fotos',FotosController::class);  //Ruta para que nos lleve al controladorFotos del admin y ejecute los métodos
   
    
});


?>