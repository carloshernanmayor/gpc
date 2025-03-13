<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\posible_cliente;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            [
                'tipo' => 'natural',
                'nombre' => 'Juan Pérez',
                'identificacion' => '1234567895',
                'telefono' => '36534239854',
                'direccion' => 'Calle Falsa 123',
                'correo' => 'juan.perez@gmail.com',
                'contacto_nombre' => null,
                'contacto_correo' => null,
                'contacto_telefono' => null,
                'fecha_registro' => Carbon::now()->subDays(10),
            ],
            [
                'tipo' => 'juridica',
                'nombre' => 'Empresa XYZ S.A.',
                'identificacion' => '987654321443',
                'telefono' => '3295645678',
                'direccion' => 'Av. Empresarial 456',
                'correo' => 'contacto@empresaxyz.com',
                'contacto_nombre' => 'María Gómez',
                'contacto_correo' => 'mgomez@empresaxyz.com',
                'contacto_telefono' => '555-4321',
                'fecha_registro' => Carbon::now()->subMonths(2),
            ],
            [
                'tipo' => 'natural',
                'nombre' => 'Carlos López',
                'identificacion' => '9876543215',
                'telefono' => '3455676789',
                'direccion' => 'Calle Central 79',
                'correo' => 'carlos.lopez@gmail.com',
                'contacto_nombre' => null,
                'contacto_correo' => null,
                'contacto_telefono' => null,
                'fecha_registro' => Carbon::now()->subWeeks(3),
            ],
        ]);
    }
}
