<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\People;

class PeopleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetPeopleWithoutAuthentication()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                        ->json('GET', '/api/people', [
                            'limit' => 10,
                            'offset'=>25
                        ]);
        
        // verify status and a litle part of response
        $response->assertStatus(200)
                ->assertJsonFragment([
                    'name'=>'Ackbar'
                ]);
    }

    public function testGetPeopleWithoutLimitWithOffsetWithoutAuthentication()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
        ->json('GET', '/api/people?offset=1');

        $response->assertStatus(400);

        $response->assertJson([
            'message' => 'limit is required when you passed offset'
        ]);
    }

    public function testShowWithoutAuthentication()
    {
        // find vehcile in db 
        $people = People::find(11);

        // do request a url
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                    ->get('/api/people/'.$people->id);

        // verify status
        $response->assertStatus(200);

        // verify respond have people data 
        $response->assertJson([
            'people' => [
                'id' => $people->id,
                'name' => $people->name,
            ]
        ]);
    }

}
