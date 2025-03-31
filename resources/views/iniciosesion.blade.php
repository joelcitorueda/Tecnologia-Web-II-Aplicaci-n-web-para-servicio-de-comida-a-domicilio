<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #25D162;
            --dark-gray: #2B2B2B;
            --darker-gray: #1D1D1D;
            --white: #FFFFFF;
        }

        .card {
            max-width: 280px;
            height: 360px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-[var(--darker-gray)] text-[var(--white)]">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-[var(--primary-color)] mb-6">Menú de Comida</h1>

        <div class="flex justify-center gap-4 mb-6">
            <button class="bg-[var(--primary-color)] text-[var(--white)] px-4 py-2 rounded-lg">Pizza</button>
            <button class="bg-[var(--primary-color)] text-[var(--white)] px-4 py-2 rounded-lg">Hamburguesas</button>
            <button class="bg-[var(--primary-color)] text-[var(--white)] px-4 py-2 rounded-lg">Bebidas</button>
        </div>

        <div class="flex flex-wrap justify-center gap-6">
            <div class="card bg-[var(--dark-gray)] p-4 rounded-lg shadow-lg">
                <img src="https://thepizzasecret.com/wp-content/uploads/2023/05/20220211142754-margherita-9920.jpg" alt="Pizza" class="w-full rounded-lg">
                <div>
                    <h2 class="text-lg font-bold">Pizza Margarita</h2>
                    <p class="text-sm text-gray-300">Pizza con salsa de tomate, queso y albahaca.</p>
                    <p class="text-lg font-semibold">20.99 Bs</p>
                </div>
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nombre" value="Pizza Margarita">
                    <input type="hidden" name="precio" value="20.99">
                    <button type="submit" class="bg-[var(--primary-color)] text-[var(--white)] w-full py-2 rounded-lg mt-2">Agregar al carrito</button>
                </form>
            </div>

            <div class="card bg-[var(--dark-gray)] p-4 rounded-lg shadow-lg">
                <img src="https://media.istockphoto.com/id/1473452859/es/foto/sabrosa-hamburguesa-con-queso-vaso-de-cola-y-papas-fritas-en-primer-plano-de-bandeja-de-madera.jpg?s=612x612&w=0&k=20&c=cz14RIorGJFn3mFhBFL66PqvXD1nYC_28Cc_OO4mhps=" alt="Hamburguesa" class="w-full rounded-lg">
                <div>
                    <h2 class="text-lg font-bold">Hamburguesa Clásica</h2>
                    <p class="text-sm text-gray-300">Jugosa carne, lechuga, tomate y queso cheddar.</p>
                    <p class="text-lg font-semibold">18.99 Bs</p>
                </div>
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nombre" value="Hamburguesa Clásica">
                    <input type="hidden" name="precio" value="18.99">
                    <button type="submit" class="bg-[var(--primary-color)] text-[var(--white)] w-full py-2 rounded-lg mt-2">Agregar al carrito</button>
                </form>
            </div>

            <div class="card bg-[var(--dark-gray)] p-4 rounded-lg shadow-lg">
                <img src="https://th.bing.com/th/id/R.5015c1ffac04c2b61e8ee80425ce5e59?rik=3ldpGwwjcH14ag&riu=http%3a%2f%2fwww.reporte90.net%2fwp-content%2fuploads%2f2018%2f08%2f39610005_1877297039021490_8195927065497698304_n.jpg&ehk=EBub92GmJo0EBj%2fMHq%2b7WR5tOLOze3Kj3oMoiYZ1grY%3d&risl=&pid=ImgRaw&r=0" alt="Bebida" class="w-full rounded-lg">
                <div>
                    <h2 class="text-lg font-bold">Coca Cola</h2>
                    <p class="text-sm text-gray-300">Refrescante bebida carbonatada.</p>
                    <p class="text-lg font-semibold">12.99 Bs</p>
                </div>
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nombre" value="Coca Cola">
                    <input type="hidden" name="precio" value="12.99">
                    <button type="submit" class="bg-[var(--primary-color)] text-[var(--white)] w-full py-2 rounded-lg mt-2">Agregar al carrito</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>