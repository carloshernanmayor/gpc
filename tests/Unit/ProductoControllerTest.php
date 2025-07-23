<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function admin_can_access_create_producto_form(){
        $this->authenticateUser();
        $response = $this->get('/producto/create');
        $response->assertStatus(200);
        $response->assertViewIs('producto.create');
    }

    /** @test */
    public function admin_can_edit_producto(){
        $this->authenticateUser();
        $producto = producto::factory()->create();
        $response = $this->get("/producto/{$producto->id_producto}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('producto.edit');
    }

    /** @test */
    public function user_can_update_producto(){
        $this->authenticateUser();
        $producto = producto::factory()->create([
            'nombre' => 'Mesa' ]);
        $response = $this->put("/producto/{$producto->id_producto}", [
            'nombre' => 'Silla',
            'tipo' => 'Mueble',
            'material' => 'madera',
            'sector' => 'Oficina',
            'dimensiones' => '80x40',
            'fecha' => now()->toDateString()
        ]);
        $response->assertRedirect('/producto');
        $this->assertDatabaseHas('producto', ['nombre' => 'Silla']);
    }

}
