<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmpEmisoraController;

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

// Ruta para vista página principal
Route::get('/',[DashboardController::class,'inicio'])->name('dashboard');

// Ruta para login
Route::get('/login', [LoginController::class,'index'])->name('login');

// Ruta de validacion de login
Route::post('/login', [LoginController::class,'store']);

// Ruta para vista registro de usuarios
Route::get('/crear', [RegisterController::class,'index'])->name('register');

// Ruta de logout
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');


// Ruta para enviar datos al servidor
Route::post('/crear', [RegisterController::class,'store']);



Route::post('/empEmisora', [EmpEmisoraController::class, 'store'])->name('Emisora');


