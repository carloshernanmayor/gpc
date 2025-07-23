<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'id_vendedor' => vendedor::factory(), // Assumes you have a VendedorFactory
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'tipo' => $this->faker->randomElement(['vendedor', 'admin']),
            'avatar' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // default password
            'remember_token' => Str::random(10),
        ];
    }
}
