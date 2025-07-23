<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\vendedor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendedorControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void{
        parent::setUp();
        $vendedor = vendedor::factory()->create();
        $this->user = User::factory()->create([
            'id_vendedor' => $vendedor->id_vendedor,
            'tipo' => 'admin',
        ]);

        $this->actingAs($this->user);
    }

    /** @test */
    public function user_can_view_vendedores_index(){
        vendedor::factory()->count(3)->create();
        $response = $this->get('/vendedor');
        $response->assertStatus(200);
        $response->assertViewIs('vendedores.index');
    }

    /** @test */
    public function vendedor_can_view_own_profile(){
        $response = $this->get('/profile');
        $response->assertStatus(200);
        $response->assertViewIs('vendedores.profile');
    }

    /** @test */
    public function admin_can_access_create_vendedor_form(){
        $response = $this->get('/vendedor/create');
        $response->assertStatus(200);
        $response->assertViewIs('vendedores.create');
    }

    /** @test */
    public function admin_can_store_new_vendedor(){
        $response = $this->post('/vendedor', [
            'nombre' => 'Luis',
            'identificacion' => '123456789',
            'telefono' => '1234567890',
            'correo' => 'lucho@gmail.com',
            'direccion' => 'Calle 123',
            'estado' => 'activo',
            'fecha_ingreso' => now()->toDateString(),
        ]);
        $response->assertRedirect('/vendedor');
        $this->assertDatabaseHas('vendedor', ['nombre' => 'Luis']);
    }

    /** @test */
    public function admin_can_edit_vendedor(){
        $vendedor = vendedor::factory()->create();
        $response = $this->get("/vendedor/{$vendedor->id_vendedor}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('vendedores.edit');
    }

    /** @test */
    public function user_can_update_vendedor(){
        $vendedor = vendedor::factory()->create(['nombre' => 'Pedro']);
        $response = $this->put("/vendedor/{$vendedor->id_vendedor}", [
            'nombre' => 'Pedro Sanchez',
            'identificacion' => '987654321',
            'correo' => 'pedro@gmail.com',
            'telefono' => '111222333',
            'estado' => 'activo',
            'fecha_ingreso' => now()->toDateString(),
        ]);

        $response->assertRedirect('/vendedor');
        $this->assertDatabaseHas('vendedor', ['nombre' => 'Pedro Actualizado']);
    }

    /** @test */
    public function user_can_inactive_vendedor(){
        $vendedor = vendedor::factory()->create(['estado' => 'activo']);
        $response = $this->delete("/vendedor/{$vendedor->id_vendedor}");
        $response->assertRedirect('/vendedor');
        $this->assertDatabaseHas('vendedor', [
            'id_vendedor' => $vendedor->id_vendedor,
            'estado' => 'inactivo'
        ]);
    }

}
