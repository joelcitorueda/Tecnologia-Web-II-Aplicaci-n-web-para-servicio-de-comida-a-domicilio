<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Registro</h2>

        @if($errors->any())
            <p class="text-red-500 text-center">❌ {{ $errors->first() }}</p>
        @endif

        <form action="{{ route('auth.registro') }}" method="POST">
            @csrf

            <label class="block mb-2 text-gray-600">Nombre</label>
            <input type="text" name="name" class="w-full p-2 border rounded-md mb-4" required>

            <label class="block mb-2 text-gray-600">Correo Electrónico</label>
            <input type="email" name="email" class="w-full p-2 border rounded-md mb-4" required>

            <label class="block mb-2 text-gray-600">Contraseña</label>
            <input type="password" name="password" class="w-full p-2 border rounded-md mb-4" required>

            <button class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
                Registrarse
            </button>
        </form>

        <p class="mt-4 text-center">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-600">Inicia sesión</a>
        </p>
    </div>

</body>
</html>
