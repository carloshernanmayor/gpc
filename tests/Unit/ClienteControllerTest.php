<?php

namespace Tests\Unit;

use App\Models\cliente;
use App\Models\User;
use App\Models\Atencion;
use App\Models\vendedor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateVendedor(){
        $vendedor = vendedor::factory()->create();
        $user = User::factory()->create([
            'tipo' => 'vendedor',
            'id_vendedor' => $vendedor->id_vendedor, ]);
        $this->actingAs($user);
        return $user;
    }

    protected function authenticateAdmin(){
        $user = User::factory()->create(['tipo' => 'admin']);
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function vendedor_can_view_him_clients(){
        $user = $this->authenticateVendedor();
        $cliente = cliente::factory()->create();
        Atencion::factory()->create([
            'id_cliente' => $cliente->id_cliente,
            'id_vendedor' => $user->id_vendedor,]);
        $response = $this->get('/cliente');
        $response->assertStatus(200);
        $response->assertViewIs('clientes.index');
    }

    /** @test */
    public function admin_can_view_all_clients(){
        $this->authenticateAdmin();
        $response = $this->get('/clientesadmin');
        $response->assertStatus(200);
        $response->assertViewIs('clientes.indexadmin');
    }

    /** @test */
    public function vendedor_can_access_form_create(){
        $this->authenticateVendedor();
        $response = $this->get('/cliente/create');
        $response->assertStatus(200);
        $response->assertViewIs('clientes.create');
    }

    /** @test */
    public function vendedor_can_store_client_and_create_atencion(){
        $this->authenticateVendedor();
        $response = $this->post('/cliente', [
            'tipo' => 'natural', 
            'nombre' => 'Carlos',
            'identificacion' => '123456',
            'telefono' => '1234567890',
            'direccion' => 'Calle 1',
            'correo' => 'carlos@test.com',
            'contacto_nombre' => 'Juan',
            'contacto_correo' => 'juan@gmail.com',
            'contacto_telefono' => '9876543210',
            'fecha_registro' => now()->toDateString(),]);
        $response->assertRedirect('/cliente');
        $this->assertDatabaseHas('cliente', ['nombre' => 'Carlos']);
        $this->assertDatabaseHas('atencion', ['observaciones' => 'cliente nuevo']);
    }

    /** @test */
    public function vendedor_can_edit_client(){
        $this->authenticateVendedor();
        $cliente = cliente::factory()->create();
        $response = $this->get("/cliente/{$cliente->id_cliente}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('clientes.edit');
    }

    

    /** @test */
    public function vendedor_update_client(){
        $this->authenticateVendedor();
        $cliente = cliente::factory()->create([
            'nombre' => 'santiago',
            'tipo' => 'natural',
        ]);
$response = $this->put("/cliente/{$cliente->id_cliente}", [
            'tipo' => 'juridica',
            'nombre' => 'Nuevo Nombre',
            'identificacion' => $cliente->identificacion,
            'telefono' => '111111',
            'direccion' => 'calle 8',
            'correo' => 'rfg@gmail.com',
            'contacto_nombre' => 'Maria',
            'contacto_correo' => 'maria@gmail.com',
            'contacto_telefono' => '333333',
            'fecha_registro' => now()->toDateString(),
        ]);
        $response->assertRedirect('/cliente');
        $this->assertDatabaseHas('cliente', ['nombre' => 'Nuevo Nombre']);
    }

    /** @test */
    public function vendedor_delete_client(){
        $this->authenticateVendedor();
        $cliente = cliente::factory()->create();
        $response = $this->delete("/cliente/{$cliente->id_cliente}");
        $response->assertRedirect('/cliente');
        $this->assertDatabaseMissing('cliente', ['id_cliente' => $cliente->id_cliente]);
    }
}
