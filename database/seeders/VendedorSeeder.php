<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\vendedor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendedor')->insert([
            [
                'nombre' => 'Luis Martínez',
                'identificacion' => '58393748573',
                'telefono' => '3985641001',
                'direccion' => 'Calle Comercio 123',
                'correo' => 'luismartinez@gmail.com',
                'fecha_ingreso' => Carbon::now()->subYears(2),
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Ana Torres',
                'identificacion' => '1834027594',
                'telefono' => '3765551002',
                'direccion' => 'Av. Central 456',
                'correo' => 'anatorres@gmail.com',
                'fecha_ingreso' => Carbon::now()->subMonths(18),
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Carlos Méndez',
                'identificacion' => '1234567898',
                'telefono' => '3554321003',
                'direccion' => 'Calle Industrial 789',
                'correo' => 'carlos.mendez@gmail.com',
                'fecha_ingreso' => Carbon::now()->subYears(3),
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sofía Ríos',
                'identificacion' => '45678093421',
                'telefono' => '3655551004',
                'direccion' => 'Boulevard Comercial 321',
                'correo' => 'sofia.rios@gmail.com',
                'fecha_ingreso' => Carbon::now()->subMonths(6),
                'estado' => 'activo',
            ],
        ]);
    }
}
