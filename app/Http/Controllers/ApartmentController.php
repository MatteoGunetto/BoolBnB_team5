<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Amenity;
use App\Models\Message;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;

//mi serve per gestire endDate, utile per gestire date/ore
use Carbon\Carbon;

//questo lo aggiungiamo per poter passare l'id dell utente loggato alla create
use Illuminate\Support\Facades\Auth;

//questo lo aggiungiamo per poter usare chiamate API

use Illuminate\Support\Facades\Http;


class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();


        return view('Apartment.index',compact('apartments'));

       

    }

    public function showOnlyYourApartments()
    {
        $user_id = Auth::id();
        $apartments = Apartment::where('user_id', $user_id)->with('promotions')->get();
    
        return view('Apartment.myApartments', ['apartments' => $apartments]);
    }

    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        $amenities = $apartment->amenities; // Recupera i servizi collegati all'appartamento
        return view('Apartment.show', compact('apartment', 'amenities'));
    }

    public function create()
    {

        $apartments = Apartment::all();
        $amenities = Amenity::all();
        return view('Apartment.create', compact('apartments', 'amenities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required|min:1',
            'rooms' => 'required|integer|numeric|min:1|max:500',
            'beds' => 'required|integer|numeric|min:1|max:500',
            'bathrooms' => 'required|integer|numeric|min:1|max:500',
            'squareMeters' => 'required|integer|numeric|min:1',
            'address' => 'required|min:1|max:255',
            //lat e lon non vanno validate perchè ci pensa direttamente Tomtom
            //'latitude' => 'required|numeric|between:-90,90',
            //'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|min:1',
            // questo nella fase di store non viene gestito dall'utente quindi non ha senso validarlo
            // 'visible' => 'required|integer|numeric',
        ]);

        // $apartment->messages()->attach($data['messages']);

        $data = $request->all();
        $data["user_id"] = Auth::id();

        $img_path = Storage::put("uploads", $data["image"]);
        $data["image"] = $img_path;

        // Chiamata tomtom per latitudine e longitudine
        $address = $data['address'];
        $apiKey = env('TOMTOM_API_KEY');
        $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

        // la chiamata API la facciamo partire direttamente con la classe
        $response = Http::get($endpoint);

        //dd($response['results'][0]['position']);

        //vedere se si può scrivere meglio il "path" per position
        //position è un array associativo dentro alla response che ha 2 "proprietà" : "lat" e "lon" che andiamo a isolare nel passaggio dopo
        $position = $response['results'][0]['position'];

        //isoliamo "lat" e "lon" come variabili per poterle inserire nel database, cosa che facciamo nel passaggio subito dopo
        $latitude = $position["lat"];
        $longitude = $position["lon"];

        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;

        $apartment = Apartment::create($data);

        
        // se esistono amenities me le "attacchi", se non esistono non fai niente
        // La funzione isset() è progettata per verificare se una variabile (o una chiave di un array) esiste/ha un valore senza generare un avviso se non lo fa.
        if (isset($data['amenities'])) {
            $apartment->amenities()->attach($data['amenities']);
        }


        return redirect()->route('Apartment.index');
        //return redirect()->route('Apartments.show', $apartment->id);
    }

    public function edit($id)
    {
        // Cerca l'appartamento nel database con l'ID specificato
        $apartment = Apartment::findOrFail($id);
        // Recupera tutti i servizi dal database
        $amenities = Amenity::all();
         // Carica la vista 'edit' e passa il progetto, i tipi e le tecnologie alla vista
         return view('Apartment.edit', compact('apartment', 'amenities'));
    }

    public function update(Request $request, $id)
    {

        // !!!
        //CAPIRE SE VOGLIAMO FARE VALIDAZIONI O MENO NELLA UPDATE
        // !!!

        // Cerca il progetto nel database con l'ID specificato
        $apartment = Apartment::findOrFail($id);

        // Recupera i dati dal form inviato
        $data = $request->all();

        //qui prendo la proprietà address di $data e la uso per fare chiamata api con cui ricavo lat e lon
        // Chiamata tomtom per latitudine e longitudine
        $address = $data['address'];
        $apiKey = env('TOMTOM_API_KEY');
        $endpoint = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key={$apiKey}";

        // la chiamata API la facciamo partire direttamente con la classe
        $response = Http::get($endpoint);

        //dd($response['results'][0]['position']);

        //vedere se si può scrivere meglio il "path" per position
        //position è un array associativo dentro alla response che ha 2 "proprietà" : "lat" e "lon" che andiamo a isolare nel passaggio dopo
        $position = $response['results'][0]['position'];

        //isoliamo "lat" e "lon" come variabili per poterle inserire nel database, cosa che facciamo nel passaggio subito dopo
        $latitude = $position["lat"];
        $longitude = $position["lon"];

        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;

 
        // qua meglio sync che attach, attach si può usare in fase di creazione, sync elimina il collegamento con quelle di cui non trova più dopo la creazione
        $apartment->amenities()->sync($request->input('amenities'));

        //qua dopo aggiungo commento per spiegare perchè serve questa cosa
        if($request->hasFile('image')) {
            // Salva il nuovo file e ottieni il percorso
            $path = $request->file('image')->store('uploads', 'public');

            $data["image"] = $path;
        }

        // Salva le modifiche   
        $apartment->update($data);

        // Reindirizza all'URL della vista 'show' per visualizzare il progetto modificato
        return redirect()->route('Apartment.index', $apartment->id);
    }

    public function destroy(Request $request, $id) {
        $apartment = Apartment::findOrFail($id);

        // Elimina o dissociare le amenità associate all'appartamento
        $apartment->amenities()->detach();

        // Elimina o dissociare i messaggi associati all'appartamento
        $apartment->messages()->delete();

        // Elimina l'appartamento
        $apartment->delete();

        return redirect()->route('Apartment.myApartments');
    }

    public function myApartments() {
        return view('Apartment.myApartments');
    }

    public function selectSponsorship($id)
    {
        $apartment = Apartment::findOrFail($id);
        $promotions = Promotion::all();
        return view('Apartment.selectSponsorship', compact('apartment', 'promotions'));
    }

    public function sponsorApartment($apartment_id, $promotion_id)
    {
        $apartment = Apartment::findOrFail($apartment_id);
        $promotion = Promotion::findOrFail($promotion_id);

        return view('Apartment.sponsorApartment', compact('apartment', 'promotion') );
    }

    public function payPromotion(Request $request)
    {
        // Validazione dei dati inviati (es. controllare la lunghezza del numero della carta, la data di scadenza, ecc.)
        $validated = $request->validate([
            'card_number' => 'required|size:16',
            'expiry_date' => 'required|size:5', // formato MM/AA
            'cvv' => 'required|size:3',
        ]);
    
        // Simula l'elaborazione del pagamento. 
        // In un'applicazione reale, qui chiameresti un gateway di pagamento come Stripe, PayPal, ecc.
        $paymentSuccess = true;  // Assumiamo che il pagamento abbia successo per questa simulazione.
    
        if($paymentSuccess) {
            // Aggiungi un record nella tua tabella ponte apartment_promotion
            // Assumiamo che tu abbia i modelli Apartment e Promotion e una relazione many-to-many tra di loro.
            $apartment = Apartment::findOrFail($request->input('apartment_id'));
            $promotion = Promotion::findOrFail($request->input('promotion_id'));
            $startDate = $request->input('startDate');

            // Calcola l'endDate in base a startDate e duration
            $duration = $promotion->durationInDays; // Supponiamo che tu abbia un campo "duration" nella tabella Promotion
            $endDate = Carbon::parse($startDate)->addDays($duration);

    
            // Associa l'appartamento alla promozione
            $apartment->promotions()->attach($promotion->id, ['startDate' => $startDate, 'endDate' => $endDate]);
    
            return redirect()->route('Apartment.myApartments')->with('success', 'Pagamento effettuato con successo su ' . $apartment->title . 'e promozione applicata!');
        } else {
            return redirect()->back()->with('error', 'Qualcosa è andato storto durante il pagamento.');
        }
    }
    
}
