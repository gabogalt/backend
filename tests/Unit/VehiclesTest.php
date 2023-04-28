<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vehicles;

class VechiclesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetVehiclesWithoutAuthentication()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                        ->json('GET', '/api/vehicles', [
                            'limit' => 10,
                            'name' => 'Sand',
                        ]);
        
        // verify status and a litle part of respond
        $response->assertStatus(200)
                ->assertJsonFragment([
                    'name' => 'Sand Crawler',
                ]);
    }

    public function testShowWithoutAuthentication()
    {
        // find vehcile in db 
        $vehicle = Vehicles::find(5);

        // do request a url
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                    ->get('/api/vehicles/'.$vehicle->id);

        // verify status
        $response->assertStatus(200);

        // verify respond have vehicle data 
        $response->assertJson([
            'vehicles' => [
                'id' => $vehicle->id,
                'name' => $vehicle->name,
                // you can more attributes depend of vechicle
            ]
        ]);
    }

    public function testShowWithUnknownIdWithoutAuthentication()
    {
        // unknown id 
        $id = 50;

        // do request a url
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                    ->get('/api/vehicles/'.$id);

        // verify status
        $response->assertStatus(400);

        // verify respond have vehicle data 
        $response->assertJson([
            'message'=> 'Not found vechicle'
        ]);
    }
}
