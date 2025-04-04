<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Pizza Margarita',
                'descripcion' => 'Deliciosa pizza con tomate, mozzarella y albahaca.',
                'precio' => 45.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Hamburguesa Clásica',
                'descripcion' => 'Jugosa hamburguesa con carne de res, lechuga y tomate.',
                'precio' => 30.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Rollito de Pizza',
                'descripcion' => 'Bocadillo relleno de queso y pepperoni, horneado a la perfección.',
                'precio' => 25.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Gaseosa',
                'descripcion' => 'Refrescante bebida gaseosa en lata.',
                'precio' => 10.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Papas Fritas',
                'descripcion' => 'Crujientes papas fritas doradas.',
                'precio' => 15.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Ensalada César',
                'descripcion' => 'Ensalada fresca con lechuga, pollo, crutones y aderezo césar.',
                'precio' => 35.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Tacos',
                'descripcion' => 'Tacos de carne con guacamole y salsa picante.',
                'precio' => 28.00,
                'created_at' => now(),
            ],
            [
                'nombre' => 'Sushi',
                'descripcion' => 'Variedad de sushi fresco con salmón y aguacate.',
                'precio' => 50.00,
                'created_at' => now(),
            ]
        ]);
    }

    public function down(): void
    {
        DB::table('productos')->truncate();
    }
};

