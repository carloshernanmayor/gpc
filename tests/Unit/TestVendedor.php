<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\vendedorController;

class TestVendedor extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function index_retorna_vista_posible_cliente()
    {
        // Simula una solicitud HTTP al método index
        $controller = new vendedorController();
        $response = $controller->index();

        // Verifica que la respuesta sea una instancia de la vista 'posibles_clientes.index'
        $response->assertViewIs('vendedores.index');
    }

    public function create_retorna_vista_vendedores_create()
    {
        $controller = new vendedorController();
        $response = $controller->create();

        $response->assertViewIs('vendedores.create');
    }
}
