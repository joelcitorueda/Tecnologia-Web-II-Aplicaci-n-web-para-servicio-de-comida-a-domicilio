<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <style>
        .selected {
            border: 2px solid #000;
            transform: scale(1.1);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="sticky top-0 bg-white shadow-md p-4 flex justify-between items-center z-50">
        <div class="flex space-x-4">
            <a href="{{ route('iniciosesion') }}" class="font-semibold text-lg">Tienda</a>
            <a href="{{ route('carrito.index') }}" class="font-semibold text-lg">Carrito</a>
            <a href="#" class="font-semibold text-lg">Contáctanos</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Finalizar Compra</h1>
        
        <h2 class="text-xl font-semibold text-center mb-4">Productos en tu compra</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($carrito as $producto)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-lg font-bold">{{ $producto['nombre'] }}</h3>
                    <p class="text-lg font-semibold">{{ $producto['precio'] }} Bs</p>
                </div>
            @endforeach
        </div>
        
        <h2 class="text-xl font-semibold text-center mt-6">Seleccione su método de pago</h2>
        <form action="{{ route('compra.procesar') }}" method="POST">
            @csrf
            <input type="hidden" name="metodo_pago" id="metodo_pago">
            
            <div class="mb-6 flex space-x-4 p-2 justify-center">
                <div class="w-1/3 bg-white shadow rounded-lg p-4 text-center cursor-pointer payment-method" data-method="Pago QR">
                    <img src="https://static.vecteezy.com/system/resources/previews/007/779/457/non_2x/qr-code-and-tap-payment-logo-set-free-vector.jpg" class="w-12 mx-auto mb-2">
                    <p>Pago QR</p>
                </div>
                <div class="w-1/3 bg-white shadow rounded-lg p-4 text-center cursor-pointer payment-method" data-method="Efectivo">
                    <img src="https://assets.softr-files.com/applications/ea30d9b6-1bf3-4776-a509-0648252289d1/assets/60150cef-6b17-4861-becf-1fdd67848161.png" class="w-12 mx-auto mb-2">
                    <p>Efectivo</p>
                </div>
            </div>

            <div id="qr-container" class="hidden text-center">
                <h3 class="text-lg font-semibold">Escanee el código QR para pagar</h3>
                <canvas id="qr-code" class="mx-auto my-4"></canvas>
            </div>

            <label class="block mb-2 text-lg">Ubicación de entrega:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="bg-gray-200 p-2 rounded w-full" readonly>
            <div id="map" class="w-full h-64 bg-gray-300 mt-2"></div>

            <button type="submit" class="bg-black text-white px-4 py-2 rounded w-full mt-4">Confirmar Compra</button>
        </form>
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -21.53549, lng: -64.72956 },
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
    <script>
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function () {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('metodo_pago').value = this.getAttribute('data-method');
                if (this.getAttribute('data-method') === "Pago QR") {
                    document.getElementById('qr-container').classList.remove('hidden');
                    let qr = new QRious({
                        element: document.getElementById('qr-code'),
                        value: "https://pago.ejemplo.com/?id=" + Math.floor(Math.random() * 1000000),
                        size: 200
                    });
                } else {
                    document.getElementById('qr-container').classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
