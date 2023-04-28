<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\UserController;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserTest extends TestCase
{ 
    public function testRegistration()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com'.rand(5, 15343443334455),
            'password' => 'passwordd'.rand(1000, 100000000),
        ];
        $response = $this->post('/api/register', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(['user', 'token']);
    }

    public function testAuthtentication()
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        $response = $this->post('/api/login', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([ 'token']);
    }

}
