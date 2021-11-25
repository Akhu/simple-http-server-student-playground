<?php

use App\Http\Controllers\Controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/route-9', [Controller::class, 'securedRoute']);
});

Route::middleware(['verify-student'])->group(function() {
    //Waiting for an header 'pikachu'
    Route::get('/route-1', [Controller::class, 'checkHeader']);

    //Waiting for an array of 'favoritePokemons' in query parameters
    Route::get('/route-2', [Controller::class, 'haveQueryParameterArray']);

    //Json Body
    Route::post('/route-3' ,[ Controller::class, 'jsonBody']);

    //Form Data with Image
    Route::post('/route-4' ,[ Controller::class, 'multipartForm']);

    //Url Encoded
    Route::post('/route-5' ,[ Controller::class, 'urlEncoded']);

    //DELETE with query parameter
    Route::delete('/route-6' ,[ Controller::class, 'delete']);

    //PUT with URL path parameter
    Route::put('/route-7/{word1}/{word2}' ,[ Controller::class, 'putForm']);

    //Patch
    Route::patch('/route-8', [Controller::class, 'patchJson']);
});

Route::post('/register', [Controller::class, 'registerApiUser']);
Route::post('/login', [Controller::class, 'login']);
