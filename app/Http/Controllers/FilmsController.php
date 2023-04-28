<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Films;

class FilmsController extends Controller
{
    /**
     * Shortcut for (createAllFilms())
     * got it films of api startwar and save it in database
     * 
     * @param string $request
     * 
     */

    public function createAllFilms(Request $request){
        $response = Http::get('https://swapi.dev/api/films');
        
        if($response->failed()){
            return response()->json(['message'=>"Error."],400);
        }

        $films = $response->object()->results;
        $data = [];
        foreach($films as $p){
            $films = new Films;
            $films->title = $p->title;
            $films->opening_crawl =  $p->opening_crawl;
            $films->director = $p->director;
            $films->producer = $p->producer;
            $films->release_date = $p->release_date;
            $films->create_at = date("Y-m-d", time());
            $films->characters = json_encode($p->characters);
            $films->vehicles = json_encode($p->vehicles);
            $films->url = $p->url;
            $films->save();
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
        $title = $request->query()['name']??null;
        if( $offset != null && $limit == null ){
            return response()->json(['message'=> 'limit is required when you passed offset'], 400);    
        }
        
        $films = new Films;
        $films = $films->getFilms($offset, $limit,$title);
        
        if(empty($films)){
            return response()->json(['message'=> 'Not found register'], 400);    
        }

        return response()->json(['count'=> count($films), 'films'=>$films], 200);
    }

    
    public function show($id){

        $film = Films::find($id);
        
        if(empty($film)){
            return response()->json(['message'=> 'Not found Film'], 400);    
        }
        return response()->json([ 'film'=>$film], 200);
    }
}
