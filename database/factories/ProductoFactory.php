<?php

namespace Database\Factories;

use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->randomElement(['electrónico', 'mecánico', 'químico', 'textil']),
            'material' => $this->faker->randomElement(['plástico', 'metal', 'madera', 'vidrio']),
            'sector' => $this->faker->randomElement(['industrial', 'comercial', 'hogar', 'construcción']),
            'dimensiones' => $this->faker->randomElement(['10x20x30', '15x15x15', '50x25x10']),
            'fecha_creacion' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
