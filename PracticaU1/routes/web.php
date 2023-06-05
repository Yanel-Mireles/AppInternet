<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\GetProductoController;

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



Route::get('/welcome', function () {
    return view('welcome');
})->name('index');

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'store']);

Route::get('/registrar', [RegisterController::class,'index'])->name('registrar-cuenta');

Route::get('/verProductos', [GetProductoController::class,'index'])->name('ver-productos');

Route::post('/registrar', [RegisterController::class,'store']);

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

Route::delete('/productos/{id}', [ProductoController::class, 'delete'])->name('productos.delete');

Route::get('/muro',[PostController::class,'index'])->name('post.index');

Route::get('/',[PostController::class,'index'])->name('post.index');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

