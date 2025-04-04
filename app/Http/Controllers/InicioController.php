<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
class InicioController extends Controller
{
    public function inicio()
    {
        $productosEnCarrito = collect(Session::get('carrito', []));

        return view('iniciosesion', compact('productosEnCarrito'));



        $productos = Producto::all(); // Obtiene todos los productos de la base de datos
        return view('iniciosesion', compact('productos')); // Pasa la variable a la vista
    }
    
}
