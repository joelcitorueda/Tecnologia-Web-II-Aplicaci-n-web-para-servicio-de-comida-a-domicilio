<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Comida</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">🍽️ Comida Express</h1>
        <a href="{{ route('auth.logout') }}" class="text-red-600 font-semibold">Cerrar sesión</a>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirmar Pedido</h2>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Tu pedido:</h3>
            <p class="text-gray-600">{{ $producto->nombre }}</p>
            <p class="text-green-600 font-bold mt-2">${{ $producto->precio }}</p>

            <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
                @csrf
                <label class="block mb-2 text-gray-600">Dirección de Entrega</label>
                <input type="text" name="direccion" class="w-full p-2 border rounded-md mb-4" required>

                <button class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-600">
                    Confirmar Pedido
                </button>
            </form>
        </div>
    </div>

</body>
</html>
