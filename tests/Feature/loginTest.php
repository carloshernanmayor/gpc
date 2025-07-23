<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Mockery;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function redirects_admin()
    {
        $user = User::factory()->make(['tipo' => 'admin']);
        Auth::shouldReceive('user')->once()->andReturn($user);
        $controller = new LoginController();
        $result = $controller->redirectTo();
        $this->assertEquals('/home', $result);
    }

    /** @test */
    public function redirects_seller()
    {
        $user = User::factory()->make(['tipo' => 'vendedor']);
        Auth::shouldReceive('user')->once()->andReturn($user);
        $controller = new LoginController();
        $result = $controller->redirectTo();
        $this->assertEquals('/homeven', $result);
    }
}