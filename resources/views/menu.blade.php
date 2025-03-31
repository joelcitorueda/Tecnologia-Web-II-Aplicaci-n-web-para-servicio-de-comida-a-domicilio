<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Comida a Domicilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /*stylos para el Carrusel 3D */
        .icon-cards {
            position: relative;
            width: 60vw;
            height: 40vw;
            max-width: 380px;
            max-height: 250px;
            margin: 0;
            color: white;
            perspective: 1000px;
            transform-origin: center;
        }

        .icon-cards__content {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-origin: center;
            transform-style: preserve-3d;
            transform: translateZ(-30vw) rotateY(0);
            animation: carousel 10s infinite cubic-bezier(0.77, 0, 0.175, 1) forwards;
        }

        .icon-cards__content.step-animation {
            animation: carousel 8s infinite steps(1) forwards;
        }

        .icon-cards__item {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 60vw;
            height: 40vw;
            max-width: 380px;
            max-height: 250px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
            border-radius: 6px;
            transform-origin: center;
        }

        .icon-cards__item:nth-child(1) {
            background: #25D162; /* Color personalizado */
            transform: rotateY(0) translateZ(35vw);
        }

        .icon-cards__item:nth-child(2) {
            background: #2B2B2B; /* Color personalizado */
            transform: rotateY(120deg) translateZ(35vw);
        }

        .icon-cards__item:nth-child(3) {
            background: #1D1D1D; /* Color personalizado */
            transform: rotateY(240deg) translateZ(35vw);
        }

        /* Animación del carrusel */
        @keyframes carousel {
            0%,  17.5%  { transform: translateZ(-35vw) rotateY(0); }
            27.5%, 45%  { transform: translateZ(-35vw) rotateY(-120deg); }
            55%, 72.5%  { transform: translateZ(-35vw) rotateY(-240deg); }
            82.5%, 100% { transform: translateZ(-35vw) rotateY(-360deg); }
        }

        /* Estilos para la página */
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: #110F15;
        }
        
        nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #FFFFFF; /* Color personalizado */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            z-index: 1000; /* Asegura que el navbar quede encima del contenido */
        }

        /* Checkbox */
        .checkbox {
            position: relative;
            margin-top: 2rem;
            font-size: .9rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #F47956;
            transition: color .3s ease;
            user-select: none;
        }

        .checkbox__checkbox {
            position: relative;
            top: 0;
            width: 1.0625rem;
            height: 1.0625rem;
            background: white;
            border: 1px solid currentColor;
            border-radius: 4px;
            vertical-align: middle;
            transition: background 0.1s ease;
            cursor: pointer;
        }

        .checkbox__checkbox::after {
            content: '';
            position: absolute;
            top: 1px;
            left: 5px;
            width: 5px;
            height: 11px;
            opacity: 0;
            transform: rotate(45deg) scale(0);
            border-right: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transition: all 0.3s ease;
            transition-delay: 0.15s;
        }

        .checkbox input:checked ~ .checkbox__checkbox {
            border-color: transparent;
            background: #F47956;
            animation: jelly 0.6s ease;

            &:after {
                opacity: 1;
                transform: rotate(45deg) scale(1);
            }
        }

        @keyframes jelly {
            from { transform: scale(1, 1); }
            30% { transform: scale(1.25, 0.75); }
            40% { transform: scale(0.75, 1.25); }
            50% { transform: scale(1.15, 0.85); }
            65% { transform: scale(0.95, 1.05); }
            75% { transform: scale(1.05, 0.95); }
            to { transform: scale(1, 1); }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('img/log.png') }}" alt="SempaiDelivery Logo" class="h-10">
            <h1 class="text-xl font-bold text-gray-800">SempaiDelivery</h1>
        </div>
        <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Iniciar sesión</a>
    </nav>

    <div class="container mx-auto mt-8 p-4 grid grid-cols-1 md:grid-cols-2 gap-8">

        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Menú</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="https://media.istockphoto.com/id/1473452859/es/foto/sabrosa-hamburguesa-con-queso-vaso-de-cola-y-papas-fritas-en-primer-plano-de-bandeja-de-madera.jpg?s=612x612&w=0&k=20&c=cz14RIorGJFn3mFhBFL66PqvXD1nYC_28Cc_OO4mhps=" alt="Platillo" class="w-full h-40 object-cover rounded-md">
                    <h3 class="text-lg font-bold mt-2">Hamburguesa Clásica</h3>
                    <p class="text-gray-600">Deliciosa hamburguesa con queso y papas fritas.</p>
                    <p class="text-green-600 font-bold mt-2">15.50 Bs</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ordenar</button>
                </div>
            </div>
        </div>

        <!-- Carrusel de Productos -->
        <div class="relative">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Destacados</h2>
            <div class="icon-cards">
                <div class="icon-cards__content">
                    <div class="icon-cards__item">
                        <img src="https://media.istockphoto.com/id/521403691/es/foto/casera-con-opciones-fr%C3%ADas-y-calientes-y-pizza-de-chorizo.jpg?s=612x612&w=0&k=20&c=e65G7OWoYUXnSWFDRKgt4Ga82vw76RaLUQ1AGvsutJw=" alt="Pizza Pepperoni">
                        
                    </div>
                    <div class="icon-cards__item">
                        <img src="https://www.pequerecetas.com/wp-content/uploads/2016/07/pasta-alfredo-con-pollo-receta.jpg" alt="Pasta Alfredo">
                       
                    </div>
                    <div class="icon-cards__item">
                        <img src="https://www.gourmet.cl/wp-content/uploads/2016/09/EnsaladaCesar2.webp" alt="Ensalada César">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="toggle-animation" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Activar animación de pasos</button>

    <script>
        function classToggle() {
            var el = document.querySelector('.icon-cards__content');
            el.classList.toggle('step-animation');
        }

        document.querySelector('#toggle-animation').addEventListener('click', classToggle);
    </script>
</body>
</html>
