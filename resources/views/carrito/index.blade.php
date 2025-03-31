<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-green-400 mb-6">Carrito de Compras</h1>

        @if(session('success'))
            <p class="text-green-400">{{ session('success') }}</p>
        @endif

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            @if(count($carrito) > 0)
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left">Producto</th>
                            <th class="text-left">Precio</th>
                            <th class="text-left">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrito as $index => $producto)
                            <tr>
                                <td>{{ $producto['nombre'] }}</td>
                                <td>{{ $producto['precio'] }} Bs</td>
                                <td>
                                    <form action="{{ route('carrito.eliminar', $index) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 px-3 py-1 rounded">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 flex gap-4">
                    <form action="{{ route('carrito.vaciar') }}" method="POST">
                        @csrf
                        <button class="bg-yellow-500 px-4 py-2 rounded">Vaciar Carrito</button>
                    </form>

                    <a href="{{ route('realizarcompra') }}" class="bg-blue-500 px-4 py-2 rounded text-white">Realizar Compra</a>
                </div>
            @else
                <p class="text-center text-gray-400">Tu carrito está vacío.</p>
            @endif
        </div>

        <a href="{{ route('iniciosesion') }}" class="mt-6 block text-center text-blue-400">Volver al menú</a>
    </div>

</body>
</html>
