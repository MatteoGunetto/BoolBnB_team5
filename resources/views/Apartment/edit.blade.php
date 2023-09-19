@extends('layouts.app')
@section('content')


<div class="container p-5">
    <h1 class="mb-3">
        Modifica Appartamento
    </h1>
    <div class="row">
        <div class="col-lg-10">
        <form method="post" enctype="multipart/form-data" action="{{ route('Apartment.update', $apartment->id)}}">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label class="form-label" for="title">Titolo:</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ $apartment -> title }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Descrizione:</label>
            <textarea name="description" id="description" class="form-control">"{{ $apartment->description }}"</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="rooms">Stanze:</label>
            <input type="number" id="rooms" name="rooms" class="form-control" value="{{ $apartment->rooms }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="beds">Posti letto:</label>
            <input type="number" id="beds" name="beds" class="form-control" value="{{ $apartment->beds }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="bathrooms">Bagni:</label>
            <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ $apartment->rooms }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="squareMeters">Superficie (mq):</label>
            <input type="text" id="squareMeters" name="squareMeters" class="form-control" value="{{ $apartment->squareMeters }}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">Indirizzo:</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $apartment->address }}">
        </div>

        <!-- suggerimenti address -->
        <div class="address-option" class="option_none"></div>
        <div class="address-option"></div>
        <div class="address-option"></div>

        <div class="mb-3">
            <!-- <label for="latitude">Latitudine:</label> -->
            <input type="hidden" id="latitude" name="latitude" class="form-control" value="{{ $apartment->latitude }}">
        </div>

        <div class="mb-3">
            <!-- <label for="longitude">Longitudine:</label> -->
            <input type="hidden" id="longitude" name="longitude" class="form-control" value="{{ $apartment->longitude }}">
        </div>

        <!-- Anteprima dell'immagine corrente -->
        <div class="mb-3">
            <label>Immagine attuale:</label>
            <div class="img-container">
                <img src="{{ asset('storage/' . $apartment->image) }}" class="img-thumbnail" alt="Apartment Image">
            </div>
        </div>

        <!-- Campo di input per il caricamento di una nuova immagine -->
        <div class="mb-3">
            <label class="form-label" for="image">Sostituisci l'immagine (lascia vuoto per mantenere l'immagine attuale):</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>


        <!-- amenities -->
        <div class="mb-3">
            <label class="form-label" for="amenities" class="form-label">Selezionare servizi aggiuntivi:</label>
            @foreach ($amenities as $amenity)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="amenities[]"
                    id="amenity-{{ $amenity->id }}" value="{{ $amenity->id }}"
                    {{$apartment->amenities->contains('id', $amenity->id) ? 'checked' : ''}}>
                <label class="form-check-label" for="amenity-{{ $amenity->id }}">
                    {{ $amenity->name }}
                </label>
            </div>
            @endforeach
        </div>

        <div class="mb-4">
            <label for="visible">Visibile:</label>
            <select name="visible" class="form-control">
                <option value="1" {{ $apartment->visible == 1 ? 'selected' : '' }}>Sì</option>
                <option value="0" {{ $apartment->visible == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary text-white">Salva Modifiche</button>
    </form>
        </div>
    </div>
</div>




<script>
    // Variabile DOM per l'elemento input.
    let searchBarDom;

    // Una volta che il DOM è caricato, individua/inizializza la variabile searchBarDom.
    document.addEventListener("DOMContentLoaded", function() {
        searchBarDom = document.getElementById("address");

        //questo è un controllo aggiuntivo che non serve nemmno, perchè sappiamo che esiste un id="address" nel nostro codice
        if (!searchBarDom) {
            console.error("Elemento 'address' non trovato");
            return; // Se l'elemento non esiste, esci dalla funzione
        }

        // Ottieni un riferimento agli elementi con la classe address-option
        const addressOptionElements = document.querySelectorAll(".address-option");

        // Imposta il testo consigliato come ricerca del indirizzo
        addressOptionElements.forEach(function(indirizzo){
            indirizzo.addEventListener("click", function(){
                searchBarDom.value=indirizzo.textContent
            });
        })


        let debounceTimer;

        //eventlistener che si attiva quando cambia il valore di searchBarDom che sarebbe il nostro campo input
        searchBarDom.addEventListener("input", function() {
            clearTimeout(debounceTimer); // Cancella qualsiasi timer esistente
            debounceTimer = setTimeout(() => { // Imposta un nuovo timer

                if  (searchBarDom.value.length > 4 ) {
                    const addressSearched = searchBarDom.value;

                    axios.get('/api/tomtom-proxy', {
                        params: {
                            address: addressSearched
                        }
                    })
                    .then(response => {
                        console.log(searchBarDom.value, "search value")
                        let suggestedAddresses = response.data.results;

                        addressOptionElements[0].innerHTML = suggestedAddresses[0].address.freeformAddress + ", " + suggestedAddresses[0].address.country;
                        addressOptionElements[1].innerHTML = suggestedAddresses[1].address.freeformAddress + ", " + suggestedAddresses[1].address.country;
                        addressOptionElements[2].innerHTML = suggestedAddresses[2].address.freeformAddress + ", " + suggestedAddresses[2].address.country;
                    })
                    .catch(error => {
                        console.error("C'è stato un errore:", error);
                    });

                    addressOptionElements.forEach(function(element) {
                        element.style.display = "block";
                    });
                }


                else {
                    addressOptionElements.forEach(function(element) {
                        element.style.display = "none";

                        // questa è una porcheria, per' "quasi" funziona, lascia i bordi dei div
                        // addressOptionElements[0].innerHTML = ""
                        // addressOptionElements[1].innerHTML = ""
                        // addressOptionElements[2].innerHTML = ""
                    });
                }
            }, 500); // Il timer è impostato per mezzo secondo (500 millisecondi)

        });

    });
</script>

<style>
    .address-option {
        display:none;
        border: var(--bs-border-width) solid var(--bs-border-color);
    }
    .option_none{
        display:none;
        cursor: pointer
    }
</style>


@endsection
