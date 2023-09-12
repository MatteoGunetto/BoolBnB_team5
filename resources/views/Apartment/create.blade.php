@extends('layouts.app')
@section('content')
    <main>
        <div class="container py-4">
            <h3>Inserisci un Appartamento</h3>
            {{-- <button type="home" class="btn btn-info"><a href="/Apartment/show"
                    class=" fw-bold text-dark text-decoration-none">appartamenti</a>
            </button> --}}
            <div class="row">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <!-- form -->
                <form action="{{ route('Apartment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input required type="text" name="title" class="form-control" id="title"
                            placeholder="Inserisci titolo" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione:</label>
                        <textarea type="text" name="description" class="form-control" id="description" rows="6"
                            placeholder="Inserisci descrizione appartamento">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rooms" class="form-label">Numero stanze:</label>
                        <input required type="number" min="1" name="rooms" class="form-control" id="rooms"
                            placeholder="Inserisci numero stanze" value="{{ old('rooms') }}">
                    </div>
                    <div class="mb-3">
                        <label for="beds" class="form-label">Numero letti:</label>
                        <input required type="number" min="1" name="beds" class="form-control" id="beds"
                            placeholder="Inserisci numero letti" value="{{ old('beds') }}">
                    </div>
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Numero bagni:</label>
                        <input required type="number" min="1" name="bathrooms" class="form-control" id="bathrooms"
                            placeholder="Inserisci numero bagni" value="{{ old('bathrooms') }}">
                    </div>
                    <div class="mb-3">
                        <label for="squareMeters" class="form-label"> dimensioni appartamento:</label>
                        <input required type="number" min="1" name="squareMeters" class="form-control"
                            id="squareMeters" placeholder="Inserisci dimensioni in mt quadri "
                            value="{{ old('squareMeters') }}">
                    </div>
                    <!-- address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">indirizzo:</label>
                        <input required type="text" name="address" class="form-control" id="address"
                            placeholder="Inserisci indirizzo" value="{{ old('address') }}">


                    </div>

                    <!-- suggerimenti address -->
                    <div class="address-option" class="option_none"></div>
                    <div class="address-option"></div>
                    <div class="address-option"></div>

                    <!-- immagine -->
                    <div class="mb-3">
                        <label for="image" class="form-label">selezionare immagine:</label>
                        <input required type="file" name="image" class="form-control" id="image"
                            placeholder="selezionare immagine" value="{{ old('image') }}">
                    </div>
                    <!-- amenities -->
                    <div class="mb-3">
                        <label for="amenities" class="form-label">Selezionare servizi aggiuntivi:</label>
                        @foreach ($amenities as $amenity)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]"
                                    id="amenity-{{ $amenity->id }}" value="{{ $amenity->id }}">
                                <label class="form-check-label" for="amenity-{{ $amenity->id }}">
                                    {{ $amenity->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>


                    <!-- submit button -->
                    <button type="submit" class="btn btn-danger">Inserisci appartamento</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

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
