<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\People;

class PeopleController extends Controller
{
    /**
     * Shortcut for (createAllPeople())
     * got it people of api startwar and save it in database
     * 
     * @param string $request
     * 
     */

    public function createAllPeople(Request $request){
        $response = Http::get('https://swapi.dev/api/people/?page=9');
        
        if($response->failed()){
            return response()->json(['message'=>"Error."],400);
        }

        $people = $response->object()->results;
        $data = [];
        foreach($people as $p){
            $people = new People;
            $people->name = $p->name;
            $people->height =  $p->height;
            $people->mass = $p->mass;
            $people->hair_color = $p->hair_color;
            $people->skin_color = $p->skin_color;
            $people->eye_color = $p->eye_color;
            $people->gender = $p->gender;
            $people->homeworld = $p->homeworld;
            $people->url = $p->url;
            $people->homeworld = $p->homeworld;
            $people->films = json_encode($p->films);
            $people->vehicles = json_encode($p->vehicles);
            $people->save();
        }
      
        return response()->json([],201);
        
    }

     /**
     * Shortcut for (index())
     * retrieving all people, 
     * 
     */
    public function index(Request $request){

        $offset = $request->query()['offset']??null;
        $limit = $request->query()['limit']??null;
        $name = $request->query()['name']??null;
        if( $offset != null && $limit == null ){
            return response()->json(['message'=> 'limit is required when you passed offset'], 400);    
        }
        
        $people = new People;
        $people = $people->getPeople($offset, $limit,$name);
        
        if(empty($people)){
            return response()->json(['message'=> 'Not found register'], 400);    
        }
        return response()->json(['count'=> count($people), 'people'=>$people], 200);
    }

      /**
     * Shortcut for (index())
     * retrieving one character by id  
     * @param int id 
     */
    public function show($id){
        
        $people = People::find($id);
        
        if(empty($people)){
            return response()->json(['message'=> 'No found character'], 400);    
        }
        return response()->json([ 'people'=>$people], 200);
    }
}
