<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Iniciar Sesión</h2>

        @if(session('success'))
            <p class="text-green-600 text-center font-bold">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <p class="text-red-500 text-center">❌ {{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                Ingresar
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">¿No tienes cuenta? 
            <a href="{{ route('registro') }}" class="text-blue-600 font-semibold">Regístrate</a>
        </p>
    </div>

</body>
</html>
