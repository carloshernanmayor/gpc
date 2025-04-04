<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\vendedor;
use App\Http\Controllers\Auth\LoginController;

class loginTest extends TestCase
{
    use RefreshDatabase;


    public function test_validarusuario()
{
    // Create a vendedor
    $vendedor = Vendedor::factory()->create([
        'nombre' => 'Santiago',
        'identificacion' => "santiago",
        'correo' => "santi@gmail.com", // Fixed typo in email
        'telefono' => "3243455678",
        'direccion' => "vendedor",
        'estado' => 'activo',
        'fecha_ingreso' => now()
    ]);

    // Create a user
    $user = User::factory()->create([
        'id_vendedor' => $vendedor->id, // Link user to vendedor
        'name' => "Santiago",
        'email' => "santi@gmail.com",  // Fixed typo in email
        'tipo' => "vendedor",
        'password' => bcrypt('1234')  // Store hashed password
    ]);

    // Log in as the user
    $this->actingAs($user);

    // Make an HTTP request instead of calling redirectTo()
    $response = $this->get('/homeven'); 

    // Check if the response is successful
    $response->assertStatus(200);
    
    // Check if the user exists in the database
    $this->assertDatabaseHas('users', [
        'email' => $user->email,
    ]);

    // Check if the correct view is returned
    $response->assertViewIs('homevendedor'); 
}

}
