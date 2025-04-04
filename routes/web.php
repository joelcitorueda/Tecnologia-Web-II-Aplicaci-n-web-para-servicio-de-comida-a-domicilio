<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Session;



Route::get('/', [MenuController::class, 'index'])->name('menu');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/auth/registro', [AuthController::class, 'register'])->name('auth.registro');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout'); 
Route::get('/iniciosesion', function () {
    return view('iniciosesion');
})->name('iniciosesion');





Route::get('/realizarcompra', function () {
    return view('realizarcompra');
})->name('realizarcompra');

Route::post('/compra/procesar', [CarritoController::class, 'procesarCompra'])->name('compra.procesar');

Route::get('/iniciosesion', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');


Route::middleware('auth')->group(function () {
    Route::post('/carrito/agregar', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
    Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.index');
    Route::delete('/carrito/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
});

Route::get('/agregar-producto', function () {
    $producto = [
        'id' => 1,
        'nombre' => 'Hamburguesa Doble',
        'precio' => 25.00,
        'cantidad' => 1,
        'imagen' => 'https://via.placeholder.com/120'
    ];

    $carrito = Session::get('carrito', []);
    $carrito[1] = $producto;
    Session::put('carrito', $carrito);

    return redirect('/inicio');
});

Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
