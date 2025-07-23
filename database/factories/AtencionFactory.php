<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\cliente;
use App\Models\vendedor;
use App\Models\guion;
use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtencionFactory extends Factory
{
    protected $model = Atencion::class;

    public function definition()
    {
        return [
            'id_cliente' => cliente::factory(),
            'id_vendedor' => vendedor::factory(),
            'id_guion' => guion::factory(),
            'id_producto' => producto::factory(),
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'resultado' => $this->faker->randomElement(['pendiente', 'exitoso', 'no interesado']),
            'observaciones' => $this->faker->optional()->sentence(8),
        ];
    }
}
