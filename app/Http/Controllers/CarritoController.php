<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Carrito;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
class CarritoController extends Controller
{
   // Mostrar productos en el carrito
   public function index()
   {
       $carrito = Carrito::where('user_id', Auth::id())
           ->join('productos', 'carritos.producto_id', '=', 'productos.id')
           ->select('carritos.id', 'productos.nombre', 'productos.precio', 'carritos.cantidad', 'productos.imagen')
           ->get();

       return view('carrito.index', compact('carrito'));
   }

   // Agregar producto al carrito
   public function agregarAlCarrito($id)
{
    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Obtener el producto
        $producto = Producto::find($id);

        if ($producto) {
            // Agregar el producto al carrito en la base de datos sin usar created_at y updated_at
            $carrito = new Carrito();
            $carrito->user_id = auth()->id();  // Relación con el usuario
            $carrito->producto_id = $producto->id;  // Relación con el producto
            $carrito->cantidad = 1;  // Cantidad de productos
            $carrito->save();  // Guardar el carrito

            // Redirigir al carrito
            return redirect()->route('carrito.index');
        }
    }

    return redirect()->route('login');  // Redirigir si no está autenticado
}



   // Eliminar un producto del carrito
   public function eliminarDelCarrito($id)
{
    $carritoItem = Carrito::find($id);
    if ($carritoItem) {
        $carritoItem->delete();
    }

    return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
}


   // Vaciar carrito
   public function vaciar()
   {
       session()->forget('carrito');
       return redirect()->route('carrito.index');
   }
   public function mostrarCarrito()
{
    $user_id = Auth::id();
    $productosEnCarrito = Carrito::where('carritos.user_id', $user_id)
        ->join('productos', 'carritos.producto_id', '=', 'productos.id')
        ->select('productos.*', 'carritos.cantidad', 'carritos.id as carrito_id')
        ->get();

    return view('carrito.index', compact('productosEnCarrito'));
}
}
