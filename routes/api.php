<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');



Route::group(['middleware' => ['jwt.verify']], function() {

    // base_url
    Route::get('/', function(){
        return response()->json([
            "people" => "https://localhost:8000/api/people/",
            "films" => "https://localhost:8000/api/films/",
            "vehicles" => "https://localhost:8000/api/vehicles/",
        ],200); 
    });

    //people 
    Route::get('people', 'App\Http\Controllers\PeopleController@index');
    Route::get('people/{id}', 'App\Http\Controllers\PeopleController@show');
    // Route::get('people/create/all', 'App\Http\Controllers\PeopleController@createAllPeople');


    //films 
    Route::get('films', 'App\Http\Controllers\FilmsController@index');
    Route::get('films/{id}', 'App\Http\Controllers\FilmsController@show');
    // Route::get('films/create/all', 'App\Http\Controllers\FilmsController@createAllFilms');

    //vehicles 
    Route::get('vehicles', 'App\Http\Controllers\VehiclesController@index');
    Route::get('vehicles/{id}', 'App\Http\Controllers\VehiclesController@show');
    // Route::get('vehicles/create/all', 'App\Http\Controllers\VehiclesController@createAllVehicles');

});

//admin routes
// Route::group( function() {
//     //users
//     Route::get('users', 'App\Http\Controllers\UserController@index');
//     Route::post('users', 'UserController@store');
//     Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
//     Route::put('users/{id}', 'UserController@update');
//     Route::delete('users/{id}', 'UserController@destroy');
//     Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

// });

