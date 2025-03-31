<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-green-400 mb-6">Finalizar Compra</h1>

        <form action="{{ route('compra.procesar') }}" method="POST">
            @csrf
            
            <!-- Selección de método de pago -->
            <div class="mb-6">
                <label class="block mb-2 text-lg">Método de Pago:</label>
                <select name="metodo_pago" class="bg-gray-800 text-white p-2 rounded w-full">
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                    <option value="transferencia">Transferencia Bancaria</option>
                </select>
            </div>

            <!-- Selección de ubicación -->
            <div class="mb-6">
                <label class="block mb-2 text-lg">Ubicación de entrega:</label>
                <input type="text" id="ubicacion" name="ubicacion" class="bg-gray-800 text-white p-2 rounded w-full" readonly>
                <div id="map" class="w-full h-64 bg-gray-700 mt-2"></div>
            </div>

            <button type="submit" class="bg-green-500 px-4 py-2 rounded w-full">Confirmar Compra</button>
        </form>

        <a href="{{ route('carrito.index') }}" class="mt-6 block text-center text-blue-400">Volver al carrito</a>
    </div>

    <!-- Google Maps API -->
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -21.53549, lng: -64.72956 }, // Coordenadas de Villamontes
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: { lat: -21.53549, lng: -64.72956 },
                map: map,
                draggable: true
            });

            marker.addListener('dragend', function () {
                var position = marker.getPosition();
                document.getElementById('ubicacion').value = position.lat() + ', ' + position.lng();
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW1OBYannwF1kA1xl5DJ9ykYQV5q9GnA8&callback=initMap" async defer></script>
</body>
</html>
