<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CarritoController extends Controller
{
    //
    public function index()
    {
        $carrito = Session::get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    public function agregar(Request $request)
    {
        $producto = [
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'cantidad' => 1
        ];

        $carrito = Session::get('carrito', []);
        $carrito[] = $producto;
        Session::put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
    }

    public function eliminar($index)
    {
        $carrito = Session::get('carrito', []);
        unset($carrito[$index]);
        Session::put('carrito', array_values($carrito));

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    public function vaciar()
    {
        Session::forget('carrito');
        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado');
    }

    public function mostrarCarrito() {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    public function vaciarCarrito() {
        session()->forget('carrito');
        return redirect()->route('carrito')->with('success', 'Carrito vaciado.');
    }

    public function eliminarProducto($id) {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session()->put('carrito', $carrito);
        return redirect()->route('carrito')->with('success', 'Producto eliminado.');
    }

    public function procesarCompra(Request $request) {
        return redirect()->route('iniciosesion')->with('success', 'Compra realizada con éxito.');
    }
}
