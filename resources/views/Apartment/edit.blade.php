@extends('layouts.app')
@section('content')

{{-- side bar --}}
                <div class="dash-nav bg-primary p-md-4 py-4 vh-100" id="sidebar" style="--bs-bg-opacity: .8;">
                    <ul class="nav flex-column  gap-2">
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('Apartment.myApartments') }}">
                                <i class="bi bi-house me-md-2"></i><span>Appartamenti</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('Apartment.myMessages') }}">
                                <i class="bi bi-envelope-paper me-md-2"></i> <span>Messagi</span>
                            </a>
                        </li>
                    </ul>
                </div>

<div class="content overflow-auto p-5">


<div class="container">
    <h1 class="mb-3">
        Modifica Appartamento
    </h1>
    <div class="row">
        <div class="col-lg-8">
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
</div>



<script>
    // Variabile DOM per l'elemento input.
    let searchBarDom;

    // Una volta che il DOM è caricato, individua/inizializza la variabile searchBarDom.
    document.addEventListener("DOMContentLoaded", function() {
        searchBarDom = document.getElementById("address");

        if (!searchBarDom) {
            console.error("Elemento 'address' non trovato");
            return;
        }

        const addressOptionElements = document.querySelectorAll(".address-option");

        addressOptionElements.forEach(function(indirizzo) {
            indirizzo.addEventListener("click", function() {
                searchBarDom.value = indirizzo.textContent;

                // Imposta il valore del campo di input e nascondi i suggerimenti
                searchBarDom.value = indirizzo.textContent;
                addressOptionElements.forEach(function(element) {
                    element.style.display = "none";
                });
            });
        });

        let debounceTimer;

        searchBarDom.addEventListener("input", function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (searchBarDom.value.length > 4) {
                    const addressSearched = searchBarDom.value;

                    axios.get('/api/tomtom-proxy', {
                        params: {
                            address: addressSearched
                        }
                    })
                    .then(response => {
                        let suggestedAddresses = response.data.results;

                        // Nascondi tutti i suggerimenti prima di aggiornarli
                        addressOptionElements.forEach(function(element) {
                            element.style.display = "none";
                        });

                        // Aggiorna i suggerimenti solo con quelli disponibili
                        for (let i = 0; i < Math.min(suggestedAddresses.length, addressOptionElements.length); i++) {
                            addressOptionElements[i].innerHTML = suggestedAddresses[i].address.freeformAddress + ", " + suggestedAddresses[i].address.country;
                            addressOptionElements[i].style.display = "block";
                        }
                    })
                    .catch(error => {
                        console.error("C'è stato un errore:", error);
                    });
                } else {
                    // Nascondi tutti i suggerimenti se la lunghezza della ricerca è inferiore a 5
                    addressOptionElements.forEach(function(element) {
                        element.style.display = "none";
                    });
                }
            }, 500);
        });

    });
</script>


<style>
    .address-option {
        display: none;
        border: 1px solid #ccc; /* Aggiungi uno stile di bordo */
        padding: 8px; /* Aggiungi spazio intorno ai suggerimenti */
        cursor: pointer; /* Cambia il cursore al passaggio del mouse */
    }

    .address-option:hover {
        background-color: #f0f0f0; /* Cambia il colore di sfondo al passaggio del mouse */
    }

    .option_none {
        display: none;
        cursor: pointer;
    }
</style>


@endsection
