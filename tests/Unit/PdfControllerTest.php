<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\cliente;
use App\Models\producto;
use App\Models\vendedor;
use App\Models\guion;
use App\Models\Atencion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PdfControllerTest extends TestCase
{
    use RefreshDatabase;

    public function authenticateUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function generate_clientepdf(){
        $this->authenticateUser();
        cliente::factory()->count(2)->create();
        $response = $this->get('/imprimircliente');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    public function it_can_generate_productopdf(){
        $this->authenticateUser();
        producto::factory()->count(2)->create();
        $response = $this->get('/imprimirproducto');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    public function can_generate_vendedorpdf(){
        $this->authenticateUser();
        vendedor::factory()->count(2)->create();
        $response = $this->get('/imprimirvendedor');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    public function can_generate_guionpdf(){
        $this->authenticateUser();
        guion::factory()->count(2)->create();
        $response = $this->get('/imprimirguion');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    public function can_generate_atencionpdf(){
        $this->authenticateUser();
        Atencion::factory()->count(2)->create();
        $response = $this->get('/imprimiratencion');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
