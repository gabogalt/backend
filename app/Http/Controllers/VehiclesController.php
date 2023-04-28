<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Vehicles;

class VehiclesController extends Controller
{
    /**
     * Shortcut for (createAllFilms())
     * got it films of api startwar and save it in database
     * 
     * @param string $request
     * 
     */

    public function createAllVehicles(Request $request){
        $response = Http::get('https://swapi.dev/api/vehicles/?page=4');
        
        if($response->failed()){
            return response()->json(['message'=>"Error."],400);
        }

        $vehicles = $response->object()->results;
        $data = [];
        foreach($vehicles as $p){
            $vehicles = new Vehicles;
            $vehicles->name = $p->name;
            $vehicles->model =  $p->model;
            $vehicles->manufacturer = $p->manufacturer;
            $vehicles->cost_in_credits =$p->cost_in_credits;
            $vehicles->length = $p->length;
            $vehicles->max_atmosphering_speed = $p->max_atmosphering_speed;
            $vehicles->crew = $p->crew;
            $vehicles->passengers =$p->passengers;
            $vehicles->cargo_capacity =$p->cargo_capacity??0;
            $vehicles->consumables = $p->consumables;
            $vehicles->vehicle_class = $p->vehicle_class;
            $vehicles->create_at = date("Y-m-d", time());
            $vehicles->pilots = json_encode($p->pilots);
            $vehicles->films = json_encode($p->films);
            $vehicles->url = $p->url;
            $vehicles->save();
        }
      
        return response()->json([],201);
        
    }

     /**
     * Shortcut for (index())
     * retrieving all films
     * 
     */
    public function index(Request $request){

        $offset = $request->query()['offset']??null;
        $limit = $request->query()['limit']??null;
        $name = $request->query()['name']??null;
    
        if( $offset != null && $limit == null ){
            return response()->json(['message'=> 'Error, limit is required if you passed  offset'], 400);    
        }
        
        $vehicles = new Vehicles;
        $vehicles = $vehicles->getVehicles($offset, $limit, $name);
      
        if(empty($vehicles)){
            return response()->json(['message'=> 'Not found registers'], 400);    
        }
        return response()->json(['count'=> count($vehicles), 'vehicles'=>$vehicles], 200);
    }

      /**
     * Shortcut for (index())
     * retrieving one vehcile by id  
     * @param int id 
     */
    public function show($id){

        $vehicles = Vehicles::find($id);
        
        if(empty($vehicles)){
            return response()->json(['message'=> 'Not found vechicle'], 400);    
        }
        return response()->json([ 'vehicles'=>$vehicles], 200);
    }
}
