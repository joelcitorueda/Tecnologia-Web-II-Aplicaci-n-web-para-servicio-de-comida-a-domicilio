<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;

Route::get('/', [MenuController::class, 'index'])->name('menu');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/auth/registro', [AuthController::class, 'register'])->name('auth.registro');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Agregado logout
Route::get('/inicio', function () {
    return view('iniciosesion'); // Asegúrate de que iniciosesion.blade.php esté en resources/views
})->name('iniciosesion');


//rutita del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{index}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::get('/iniciosesion', function () {
    return view('iniciosesion');
})->name('iniciosesion');

Route::get('/realizarcompra', function () {
    return view('realizarcompra');
})->name('realizarcompra');

Route::post('/compra/procesar', [CarritoController::class, 'procesarCompra'])->name('compra.procesar');