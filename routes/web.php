<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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

# Endpoints, de la vista que se debe de mostrar

//Ruta con sintaxis "clusher" cuando no usas un controlador
Route::get('/', function () {
    return view('principal');
});

//Ruta que apunta al controlador, en donde esta la url
//Registra la ruta y registra la funcion                  Esto sirve para registrar el nombre de rutas
Route::get('/register', [RegisterController::class,'index'])->name('register');

//Se envia con peticion de tipo post
//Cuando se envia un post, decimos que llamara a otro metodo del controlador
Route::post('/register', [RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login'); //Cargar login normal
Route::post('/login',[LoginController::class,'store'])->name('login'); //(se puede quitar)
Route::post('/logout',[LogoutController::class,'store'])->name('logout'); //Para cerrar sesion

//Una vez registrado/loggeado, lo redireccionamos al muro
Route::get('/muro',[PostController::class,'index'])->name('posts.index');  



