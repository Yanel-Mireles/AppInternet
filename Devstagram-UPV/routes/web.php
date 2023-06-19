<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImagenController;
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
/*

Aquí tienes el código comentado:

php
Copy code
Route::get('/', [Dashboard::class, 'inicio']);
Esta línea de código define una ruta GET para la URL raíz ("/") que se asigna al método "inicio" del controlador "Dashboard".
 Cuando un usuario accede a la URL raíz,
 se llama al método "inicio" del controlador "Dashboard" para manejar la solicitud.
*/

// Ruta para vista página principal
Route::get('/',[Dashboard::class,'inicio']);

// se pueden crear alias
// Ruta para vista registro de usuarios
Route::get('/crearCuenta',[RegisterController::class,'index'])->name('register');

//Ruta para enviar datos al servidor
Route::post('/crearCuenta',[RegisterController::class,'store']);

//Ruta para mostrar el dashboard del usuario identificado
// Route::get('/muro',[PostController::class,'index'])->name('post.index');

//Ruta para login
Route::get('/login',[LoginController::class,'index'])->name('login');

//Ruta de validacion del login
Route::post('/login',[LoginController::class,'store']);

//Ruta para logout  
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//ruta para formulario de publicacione
Route::get('post/create',[PostController::class,'create'])->name('post.create');

Route::post('post/create',[PostController::class,'store'])->name('post.store');

//ruta para cargar imagenes
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');


//ruta oara almacenar post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');



//ruta para mostrar una imagen abierta con sus datos
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');

//ruta oara mostrar ek dashboard del usuario autenticado 
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');