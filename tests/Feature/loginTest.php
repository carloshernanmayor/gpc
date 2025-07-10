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
    $vendedor = Vendedor::factory()->create([
        'nombre' => 'Santiago',
        'identificacion' => "santiago",
        'correo' => "santi@gmail.com", 
        'telefono' => "3243455678",
        'direccion' => "vendedor",
        'estado' => 'activo',
        'fecha_ingreso' => now()
    ]);

    $user = User::factory()->create([
        'id_vendedor' => $vendedor->id,
        'name' => "Santiago",
        'email' => "santi@gmail.com",  
        'tipo' => "vendedor",
        'password' => bcrypt('1234') 
    ]);

    $this->actingAs($user);

    $response = $this->get('/homeven'); 

    $response->assertStatus(200);
    $this->assertDatabaseHas('users', [
        'email' => $user->email,
        'password'=>$user->password
    ]);

    $response->assertViewIs('homevendedor'); 
}

}
