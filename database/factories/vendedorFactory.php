<?php

namespace Database\Factories;

use App\Models\vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    protected $model = vendedor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'identificacion' => $this->faker->unique()->numerify('##########'),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'correo' => $this->faker->unique()->safeEmail,
            'fecha_ingreso' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
