<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Atencion;
use App\Models\cliente;
use App\Models\guion;
use App\Models\producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AtencionControllerTest extends TestCase{
    use RefreshDatabase;

    protected function authenticateVendedor(){
        $user = User::factory()->create(['tipo' => 'vendedor', 'id_vendedor' => 1]);
        $this->actingAs($user);
        return $user;
    }

    protected function authenticateAdmin(){
        $user = User::factory()->create(['tipo' => 'admin']);
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function vendedor_can_view_their_own_atenciones(){
        $this->authenticateVendedor();
        $response = $this->get('/atencion');
        $response->assertStatus(200);
        $response->assertViewIs('Atencion.index');
    }

    /** @test */
    public function admin_can_view_all_atenciones(){
        $this->authenticateAdmin();
        $response = $this->get('/atencionadmin');
        $response->assertStatus(200);
        $response->assertViewIs('Atencion.indexadmin');
    }

    /** @test */
    public function vendedor_can_access_form_create(){
        $this->authenticateVendedor();
        guion::factory()->count(1)->create();
        producto::factory()->count(1)->create();
        cliente::factory()->count(1)->create();
        $response = $this->get('/atencion/create');
        $response->assertStatus(200);
        $response->assertViewIs('atencion.create');
    }

    /** @test */
    public function vendedor_can_store_atencion(){
        $this->authenticateVendedor();
        $guion = guion::factory()->create();
        $producto = producto::factory()->create();
        $cliente = cliente::factory()->create();
        $response = $this->post('/atencion', [
            'cliente' => $cliente->id_cliente,
            'producto' => $producto->id_producto,
            'guion' => $guion->id_guion,
            'resultado' => 'Éxitoso',
            'obser' => 'El cliente quedo contento'
        ]);
        $response->assertRedirect('/atencion');
        $this->assertDatabaseHas('atencion', [
            'resultado' => 'Éxitoso',
            'observaciones' => 'nueva atencion',
        ]);
    }

    /** @test */
    public function vendedor_can_edit_atencion(){
        $this->authenticateVendedor();
        $atencion = Atencion::factory()->create([
            'id_vendedor' => auth()->user()->id_vendedor]);
        $response = $this->get("/atencion/{$atencion->id_atencion}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('Atencion.edit');
    }
}
