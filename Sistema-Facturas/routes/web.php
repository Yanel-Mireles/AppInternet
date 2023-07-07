<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;


use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\FacturaController;


use App\Http\Controllers\ReceptoraController;
use App\Http\Controllers\ArchivoController;
use App\Models\Factura;
use App\Models\Receptor;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Ruta para redireccionar a la vista Emisora
Route::get('/emisora', [EmisoraController::class,'index'])->name('empresa.emisora');

// Muestra el formulario para crear una nueva empresa emisora
Route::get('/emisora/create', [EmisoraController::class, 'create'])->name('crearEmpresaEmisora');

// Ruta para almacenar empresa emisora
Route::post('/emisora/emisora-store', [EmisoraController::class,'store'])->name('emisora.store');

// Ruta para redireccionar a la vista Receptora
Route::get('/receptora', [ReceptoraController::class,'index'])->name('empresa.receptora');

// Muestra el formulario para crear una nueva empresaReceptora
Route::get('/receptora/create', [ReceptoraController::class,'create'])->name('crearEmpresaReceptora');

// Ruta para almacenar empresa receptora
Route::post('/emisora/receptora-store', [ReceptoraController::class,'store'])->name('receptora.store');

// Ruta para redireccionar a la vista Facturas
// Route::get('/factura', [FacturaController::class,'index'])->name('facturacion');
// Route::get('/factura', [FacturaController::class, 'index'])->name('facturacion');


// Ruta para redireccionar a la vista Facturas
Route::post('/factura/factura-store', [FacturaController::class,'store'])->name('facturacion.store');


// Ruta para guardar un archio PDF en uploadspdf
Route::post('/archivo/pdf', [ArchivoController::class, 'storepdf'])->name('archivospdf.store');

// Ruta para guardar un archivo XML en uploadsxml
Route::post('/archivo/xml', [ArchivoController::class, 'storexml'])->name('archivosxml.store');




// Ruta para redireccionar a la tabla facturas
Route::get('/facturas', [FacturaController::class,'index'])->name('factura.tabla');

// Muestra el formulario para crear una nueva empresa emisora
Route::get('/factura', [FacturaController::class, 'create'])->name('facturacion');

Route::post('/buscar', [DashboardController::class,'buscar'])->name('buscar.factura');