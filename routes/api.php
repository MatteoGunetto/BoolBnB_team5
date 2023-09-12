<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentApiController;;


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
//Route :: prefix ('v1') -> group(function() {

    Route::get("/apartments", [ApartmentApiController::class, "apartmentsIndex"]);

    Route::get("/apartments/{id}", [ApartmentApiController::class, "apartmentsShow"] );
//});

Route::get('/tomtom-proxy', function (Request $request) {
    $address = $request->input('address');
    $apiKey = env('TOMTOM_API_KEY');
    $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

    $response = Http::get($endpoint);

    return $response->json();
});

Route::get('/qualcosa', function(Request $request) {
    $address= "via giulia 14, roma";
    $apiKey = env('TOMTOM_API_KEY');
    $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

    $response = Http::get($endpoint);

    dd($response);

})