<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PeopleCollection extends ResourceCollection
{
    /**
     * Shortcut for (create_all_people())
     * got it people of api startwar and save it in database
     * 
     * @param string $request['orderid']
     * 
     */

    public function createAllPeople(Request $request){
        $page = $request->query('page');
        $response = Http::get('https://swapi.dev/api/people/');
        
        if($response->failed()){
            return response()->json(['message'=>"Hubo un error al consultar el API."],400);
        }

        $people = $response->object()->results;
        foreach($people as $p){
            $data = [
                'name' => $p->name,
                'height' => $p->height,
                'mass' => $p->mass,
                'hair_color' => $p->hair_color,
                'skin_color' => $p->skin_color,
                'eye_color' => $p->eye_color,
                'gender' => $p->gender,
                'homeworld' => $p->homeworld,
                'url' => $p->url,
                'homeworld' => $p->homeworld,
                'films' => json_encode($p->films),
                'vehicles' => json_encode($p->vehicles),
                'create_at' => date("Y-m-d")
            ];

            return $data;
            exit;
        }
        
    }
}
