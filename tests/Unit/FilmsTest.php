<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Films;

class FilmsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetFilmsWithoutAuthentication()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                        ->json('GET', '/api/films', [
                            'limit' => 10,
                            'offset'=>25
                        ]);
        
        // verify status and a litle part of response
        $response->assertStatus(200)
                ->assertJsonFragment([
                    'title'=>'A New Hope'
                ]);
    }


    public function testShowWithoutAuthentication()
    {
        // find vehcile in db 
       $films = Films::find(12);

        // do request a url
        $response = $this->withoutMiddleware(\App\Http\Middleware\JwtMiddleware::class)
                    ->get('/api/films/'.$films->id);

        // verify status
        $response->assertStatus(200);

        // verify respond have films data 
        $response->assertJson([
            'film' => [
                'id' =>$films->id,
                'title' =>$films->title,
            ]
        ]);
    }

}
