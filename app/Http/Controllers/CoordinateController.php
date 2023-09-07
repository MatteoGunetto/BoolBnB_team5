<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinate;

class CoordinateController extends Controller
{
    public function salvaCoordinate($address)
    {
        $coordinate = $this->ottieniCoordinateDaTomTom($address);

        if ($coordinate) {
            Coordinate::create([
                'address' => $address,
                'latitudine' => $coordinate['lat'],
                'longitudine' => $coordinate['lon'],
            ]);

            return 'Coordinate salvate nel database.';
        } else {
            return 'Impossibile salvare le coordinate nel database.';
        }
    }

    private function ottieniCoordinateDaTomTom($address)
    {
        $client = new Client();

        try {
            $response = $client->get('https://api.tomtom.com/search/2/geocode.json', [
                'query' => [
                    'key' => 'LniQYUULDCzJJMUOaiHUmUwFKbUchZLZ',
                    'query' => $address,
                ],
            ]);

            $result = json_decode($response->getBody(), true);

            if (isset($result['results'][0]['position'])) {
                return $result['results'][0]['position'];
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
    public function inserisciForm()
{
    return view('coordinate.create');
}

public function salvaCoordinate(Request $request)
{
    $request->validate([
        'indirizzo' => 'required|string',
    ]);

    $indirizzo = $request->input('indirizzo');
    $coordinate = $this->ottieniCoordinateDaTomTom($indirizzo);

    if ($coordinate) {
        Coordinate::create([
            'indirizzo' => $indirizzo,
            'latitudine' => $coordinate['lat'],
            'longitudine' => $coordinate['lon'],
        ]);

        return redirect()->route('coordinate.inserisci')->with('success', 'Coordinate salvate nel database.');
    } else {
        return redirect()->route('coordinate.inserisci')->with('error', 'Impossibile salvare le coordinate nel database.');
    }
}




}
