<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SempaiDelivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .btn-primary, .price, .total, .navbar-brand, .nav-link, .footer-logo, .order-summary h4 {
            color: #9FB3DF !important;
        }
        .btn-primary {
            background-color: #9FB3DF;
            border-color: #9FB3DF;
        }
        .btn-primary:hover {
            background-color: #7D97C6;
            border-color: #7D97C6;
        }
        .card {
            border-radius: 12px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .order-summary {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .search-bar {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
        }
        .search-bar input {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .search-bar button {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 2rem;
        }
        .footer-logo {
            width: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">SempaiDelivery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('carrito.index') }}">Carrito</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="search-bar mb-4">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar productos...">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Nuestra Tienda</h2>
                <div class="row">
                    @foreach($productos as $producto)
                        <div class="col-12 mb-4">
                            <div class="card shadow-sm d-flex flex-row align-items-center p-3">
                                <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/120' }}" class="img-thumbnail me-3" style="width: 120px; height: 120px; object-fit: cover; border-radius: 10px;" alt="{{ $producto->nombre }}">

                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title mb-1">{{ $producto->nombre }}</h5>
                                    <p class="mb-1">{{ Str::limit($producto->descripcion, 80) }}</p>
                                </div>

                                <div class="text-end">
                                    <p class="price">Bs {{ number_format($producto->precio, 2) }}</p>
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="order-summary">
                    <h4>Resumen del Pedido</h4>
                    <p>Subtotal: <span id="subtotal">Bs 0.00</span></p>
                    <p>Envío: <span id="envio">Bs 0.00</span></p>
                    <p>Impuestos: <span id="impuestos">Bs 0.00</span></p>
                    <p class="total">Total: <span id="total">Bs 0.00</span></p>
                    <button class="btn btn-primary w-100">Proceder al Pago</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-5 mt-5">
        <p class="mb-2">Proyecto de Tecnología Web II - Sistema <strong>SempaiDelivery</strong></p>
        <p class="mb-2">Aceptamos pagos con:</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Mastercard" class="footer-logo">
        <p class="mt-3 mb-0">&copy; 2025 SempaiDelivery. Todos los derechos reservados.</p>
    </footer>

    <script>
        let subtotal = 0;
        function agregarAlCarrito(id, nombre, precio) {
            subtotal += precio;
            document.getElementById("subtotal").innerText = `Bs ${subtotal.toFixed(2)}`;
            document.getElementById("total").innerText = `Bs ${subtotal.toFixed(2)}`;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
