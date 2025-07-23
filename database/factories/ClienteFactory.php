<?php

namespace Database\Factories;

use App\Models\cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = cliente::class;

    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement(['natural', 'juridica']),
            'nombre' => $this->faker->name,
            'identificacion' => $this->faker->unique()->numerify('##########'),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'correo' => $this->faker->unique()->safeEmail,
            'contacto_nombre' => $this->faker->optional()->name,
            'contacto_correo' => $this->faker->optional()->safeEmail,
            'contacto_telefono' => $this->faker->optional()->phoneNumber,
            'fecha_registro' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
