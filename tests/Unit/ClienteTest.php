<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Controllers\clienteController;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function Test_cliente_index()
{
    // 1. Simulate a logged-in user
    $user = User::factory()->create([
        'id_vendedor' => 1, // Ensure this matches your Atencion data
    ]);
    $this->actingAs($user);

    // 2. Create fake Atencion records
    $clientes = Cliente::factory(3)->create(); // Creates 3 clients
    foreach ($clientes as $cliente) {
        Atencion::factory()->create([
            'id_vendedor' => $user->id_vendedor,
            'id_cliente' => $cliente->id_cliente,
        ]);
    }

    // 3. Make a GET request to the index route
    $response = $this->get(route('clientes.index'));

    // 4. Assert response is OK and contains expected data
    $response->assertStatus(200);
    $response->assertViewIs('clientes.index');
    $response->assertViewHas('clientes', function ($clientes) {
        return $clientes->count() === 3; // Should return 3 clients
    });
}


  /** @test */
    public function test_clientes_create()
    {
        $controller = new clienteController();
        $response = $controller->create();

        $response->assertViewIs('clientes.create');
    }



    public function store_guarda_nuevo_posible_cliente_y_redirige_correctamente()
    {
        $request = new Request([
            'nombre' => 'andres',
            'identificacion' => '123456789',
            'telefono' => '555-1234',
            'direccion' => 'Calle de prueba',
            'correo' => 'prueba@example.com',
        ]);

        $controller = new posibleclienteController();
        $response = $controller->store($request);

        $response->assertRedirect('posibles_clientes.index');


        $this->assertDatabaseHas('cliente', [
            'nombre' => 'Nombre de prueba',
            'identificacion' => '123456789',
            'telefono' => '555-1234',
            'direccion' => 'Calle de prueba',
            'correo' => 'prueba@example.com',
        ]);

        $newPosibleCliente = posible_cliente::where('nombre', 'andres')->first();
        $this->assertNotNull($newPosibleCliente);
        $this->assertDatabaseHas('atenciones', [
            'id_posible_cliente' => $newPosibleCliente->id_posible_cliente,
        ]);
    }

    public function edit_retorna_vista_edit_con_posible_cliente_existente()
    {
        $posibleCliente = posible_cliente::factory()->create();

        $controller = new posibleclienteController();
        $response = $controller->edit($posibleCliente->id_posible_cliente);

        $response->assertViewIs('posibles_clientes.edit');

        $poscliente = $response->viewData('poscliente');
        $this->assertInstanceOf(posible_cliente::class, $poscliente);

        $this->assertEquals($posibleCliente->id_posible_cliente, $poscliente->id_posible_cliente);
    }

    public function edit_retorna_error_404_para_posible_cliente_no_existente()
    {
        $controller = new posibleclienteController();
        $response = $controller->edit(999);

        $response->assertStatus(404);
    }

    public function update_actualiza_posible_cliente_y_redirige_correctamente()
    {
        $posibleCliente = posiblecliente::factory()->create();

        $request = new Request([
            'identificacion' => '987654321',
            'nombre' => 'maricela',
            'direccion' => 'avenida 6',
            'correo' => 'nuevo@example.com',
            'telefono' => '555-5678',
        ]);

        $controller = new posibleclienteController();
        $response = $controller->update($request, $posibleCliente->id_posible_cliente);

        $response->assertRedirect('posibles_clientes.index');

        $posibleCliente->refresh();

        $this->assertEquals('987654321', $posibleCliente->identificacion);
        $this->assertEquals('maricela', $posibleCliente->nombre);
        $this->assertEquals('avenida 6', $posibleCliente->direccion);
        $this->assertEquals('nuevo@example.com', $posibleCliente->correo);
        $this->assertEquals('555-5678', $posibleCliente->telefono);
    }

    public function destroy_elimina_posible_cliente_y_redirige_correctamente()
    {
        $posibleCliente = posiblecliente::factory()->create();

        $controller = new posibleclienteController();
        $response = $controller->destroy($posibleCliente->id_posible_cliente);

        $response->assertRedirect('posiblecliente');

        $this->assertDatabaseMissing('posible_clientes', [
            'id_posible_cliente' => $posibleCliente->id_posible_cliente,
        ]);
    }
}







