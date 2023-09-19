@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h1 class="">I tuoi appartamenti</h1>
                <a class="btn btn-outline-primary" href="{{ route('Apartment.create') }}">Aggiungi un appartamento  <i class="bi bi-plus-lg"></i></a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($apartments as $apartment)
                <div class="col">
                    <div class="card">

                        <i class="actionReveal bi bi-three-dots position-absolute top-0 end-0 text-white me-2"  data-target="actionPanel-{{ $apartment->id }}" style="font-size: 1.8rem;"></i>
                    <!-- Bottoni edit ed elimina -->
                    <ul id="actionPanel-{{ $apartment->id }}" class="list-group list-group-flush position-absolute top-0 end-0 d-none">
                        <li class="list-group-item">

                            <!-- BOTTONE EDIT -->
                            <a class="btn" href="{{ route('Apartment.edit', $apartment->id) }}">
                                <i class="bi bi-pencil-square me-1"></i>
                                Edit
                            </a>
                        </li>
                        <li class="list-group-item">
                        <form class="d-inline" method="POST" action="{{ route('Apartment.destroy', $apartment->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <!-- bottone collegato alla modale -->
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $apartment->id }}">
                                        <i class="bi bi-trash3"></i>
                                        Delete
                                    </button>
                                </form>
                        </li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_modal_{{ $apartment->id }}" tabindex="-1" aria-labelledby="deleteModal_{{ $apartment->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModal_{{ $apartment->id }}">Sei sicuro di voler eliminare l'appartamento:</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>
                                    {{$apartment->title}}
                                    </strong>
                                ?
                                </div>
                                <div class="modal-footer">
                                    <!-- bottoni della modale -->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>
                       
                    <!-- IMMAGINE -->
                        {{-- se l'img è vuota allora mettine una di default --}}
                        @if (!empty($apartment->image))
                            <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="Apartment Image">
                        @else
                            <img src="{{ asset('storage/default_image.png') }}" class="card-img-top" style="height: 280px "
                                alt="Default Image">
                        @endif

                        <!-- BODY DELLA CARD -->
                        
                        <div class="card-body">

                            <h5 class="card-title">{{ $apartment->title }}</h5>

                            <p class="card-text">Location: {{ $apartment->address }}</p>
                            <!-- BOTTONE DETTAGLI -->
                            <a href="{{ route('Apartment.show', $apartment->id) }}" class="btn btn-info">Dettagli</a>
                            
                            <!-- BOTTONE SPONSOR -->
                            <a href="{{ route('Apartment.selectSponsorship', $apartment->id) }}" class="btn btn-warning">Sponsor</a>

                        
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


<script>

//  // Ottieni tutti gli elementi con la classe "mostra-tabella"
//  var buttons = document.querySelectorAll(".actionReveal");

// // Aggiungi un gestore di eventi a ciascun pulsante
// buttons.forEach(function (button) {
//     button.addEventListener("click", function () {
//         // Ottieni l'ID della tabella target dall'attributo "data-target"
//         var targetId = button.getAttribute("data-target");

//         // Ottieni l'elemento tabella target
//         var table = document.getElementById(targetId);
//         table.classList.toggle('d-none');
//         table.classList.add('is-active');

//     });
// });

    
    // // Aggiungi un gestore di eventi al pulsante "Conferma"
    // document.getElementById("confirmDelete").addEventListener("click", function () {
    //    // Qui inserisci il codice per l'eliminazione effettiva dell'elemento
    //    // Puoi utilizzare AJAX, una richiesta HTTP, o qualsiasi altro metodo necessario per l'eliminazione.

    //    // Chiudi la modale dopo l'eliminazione
    //    $("#myModal").modal("hide");
    // });


    document.body.addEventListener("click", function (event) {
    var buttons = document.querySelectorAll(".actionReveal");
    // Verifica se il clic è avvenuto su un pulsante con la classe "actionReveal"
    if (event.target.classList.contains("actionReveal")) {
        var targetId = event.target.getAttribute("data-target");
        var table = document.getElementById(targetId);
        // Chiudi tutti i pannelli delle azioni aperti
        var closeList = document.querySelectorAll(".is-active");
        closeList.forEach(function (close) {
            close.classList.add("d-none");
            close.classList.remove("is-active");
        });
        // Apri il pannello delle azioni corrispondente al pulsante cliccato
        if (table) {
            table.classList.toggle("d-none");
            table.classList.add("is-active");
        }
    } else {
        // Chiudi tutti i pannelli delle azioni aperti se il clic è al di fuori dei pulsanti "actionReveal"
        var closeList = document.querySelectorAll(".is-active");
        closeList.forEach(function (close) {
            close.classList.add("d-none");
            close.classList.remove("is-active");
        });
    }
});
    

</script>


    </div>

    </div>
@endsection

