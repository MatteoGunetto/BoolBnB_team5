<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentApiController;
use App\Http\Controllers\Api\AmenityApiController;
use App\Http\Controllers\Api\MessageApiController;

use App\Models\Apartment;
use App\Models\Amenity;
use App\Models\Message;
use App\Models\Promotion;


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


    Route::get("/apartments", [ApartmentApiController::class, "apartmentsIndex"]);

    Route::get("/apartments/{id}", [ApartmentApiController::class, "apartmentsShow"] );


    Route::get('/tomtom-proxy', function (Request $request) {
    $address = $request->input('address');
    $apiKey = env('TOMTOM_API_KEY');
    $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

    $response = Http::get($endpoint);

    return $response->json();
});


Route::get('/qualcosa', function(Request $request) {

    //$address deve arrivare come input da frontend
    // $address = "Via del corso 14, Roma";

    $address = $request->input('address');
    $apiKey = env('TOMTOM_API_KEY');
    $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";
    $response = Http::get($endpoint);

    // lat e lon ci serviranno nella query per trovare tutti gli appartmanenti nel raggio di x km
    $lat = $response->json()["results"][0]["position"]["lat"];
    $lon = $response->json()["results"][0]["position"]["lon"];

    //$distance deve arrivare come input da frontend
    $distance = 20; // In km

    $apartments = Apartment::with('amenities')
    ->select(DB::raw("*, ST_Distance_Sphere(POINT(longitude, latitude), POINT($lon, $lat)) / 1000 AS distance"))
    ->whereRaw('ST_Distance_Sphere(POINT(longitude, latitude), POINT(?, ?)) < ?', [$lon, $lat, $distance * 1000])
    ->orderBy('distance')
    ->with('promotions')
    ->get();

    return $apartments;
});

Route::get("/allAmenities", [AmenityApiController::class, "amenitiesIndex"]);
Route::post("/allMessages", [MessageApiController::class, "messagesIndex"]);

Route::get("/filteredApartments", [ApartmentApiController::class, "filterApartments"]);

//rotta per mandare al frontend solo appartamenti sponsorizzati per la home
Route::get("/promoApartmentsForHome", [ApartmentApiController::class, "promoApartmentsForHome"]);
