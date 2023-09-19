@extends('layouts.app')
@section('content')
    <main>
        <div class="container p-5">
            <h1 class="mb-3">Inserisci un Appartamento</h1>
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

                <div class="col-lg-8">
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
                    <div class=>
                        <label for="address" class="form-label">indirizzo:</label>
                        <input required type="text" name="address" class="form-control" id="address"
                            placeholder="Inserisci indirizzo" value="{{ old('address') }}">


                    </div>

                    <!-- suggerimenti address -->
                    <div class="address-option" class="option_none"></div>
                    <div class="address-option"></div>
                    <div class="address-option"></div>

                    <!-- immagine -->
                    <div class="my-3">
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
                    <button type="submit" class="btn btn-primary text-white">Inserisci appartamento</button>
                </form>
                </div>
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

