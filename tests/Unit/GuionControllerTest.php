<?php

namespace Tests\Unit;

use App\Models\guion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateUser(){
        $user = User::factory()->create(); 
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function user_see_guion_indexadmin(){
        $this->authenticateUser();
        guion::factory()->count(3)->create();
        $response = $this->get('/guionadmin');
        $response->assertStatus(200);
        $response->assertViewIs('guion.indexadmin');
    }


    /** @test */
    public function user_edit_guion(){
        $this->authenticateUser();
        $guion = guion::factory()->create();
        $response = $this->get("/guion/{$guion->id_guion}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('guion.edit');
    }

    /** @test */
    public function admin_can_update_guion(){
        $this->authenticateUser();
        $guion = guion::factory()->create([
            'canal' => 'SMS',
            'mensaje' => 'hola,'
        ]);
        $response = $this->put("/guion/{$guion->id_guion}", [
            'canal' => 'WhatsApp',
            'mensaje' => 'hola',
            'fecha' => now()->toDateString()
        ]);
        $response->assertRedirect('/guion');
        $this->assertDatabaseHas('guion', [
            'canal' => 'WhatsApp',
            'mensaje' => 'hola'
        ]);
    }

    /** @test */
    public function user_delete_guion(){
        $this->authenticateUser();
        $guion = guion::factory()->create();
        $response = $this->delete("/guion/{$guion->id_guion}");
        $response->assertRedirect('/guion');
        $this->assertDatabaseMissing('guion', [
        'id_guion' => $guion->id_guion
        ]);
    }
}
