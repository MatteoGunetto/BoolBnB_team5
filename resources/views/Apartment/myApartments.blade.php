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

                        <i class="actionReveal bi bi-three-dots text-white position-absolute top-0 end-0 me-2"  data-target="actionPanel-{{ $apartment->id }}" style="font-size: 1.8rem; z-index:20;"></i>
                    <!-- Bottoni edit ed elimina -->
                    <ul id="actionPanel-{{ $apartment->id }}" class="actionPanel list-group list-group-flush position-absolute top-0 end-0 d-none">
                        <li class="list-group-item">

                            <!-- BOTTONE EDIT -->
                            <a class="btn" href="{{ route('Apartment.edit', $apartment->id) }}">
                                <i class="bi bi-pencil-square me-1"></i>
                                Edit
                            </a>
                        </li>
                        <li class="list-group-item">
                            <form id="deleteForm" class="d-inline" method="POST" action="{{ route('Apartment.destroy', $apartment->id) }}">
                                        @csrf
                                        @method('DELETE')

                                <!-- bottone collegato alla modale -->
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $apartment->id }}">
                                    <i class="bi bi-trash3"></i>
                                    Delete
                                </button>

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
                                                <button id="submitButton" type="submit" class="btn btn-danger">Elimina</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>



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

                            <!-- Modal dettagli -->
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $apartment->id }}">
                            Dettagli
                            </button>

                            <!-- Modal -->
                            <div class="detailModal modal fade" id="detailModal-{{ $apartment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header flex-column justify-content-end align-items-start" style="background-image: linear-gradient(216deg, rgba(255,255,255,0) 0%, rgba(0,0,0,0.5998993347338936) 100%), url('{{ asset('storage/' . $apartment->image) }}');">
                                        <h1 class="modal-title fs-3 text-white" id="exampleModalLabel"> {{$apartment->title}} </h1>
                                        <div class="modal-icons d-flex gap-2 text-white">
                                            <div class="service-container">
                                                Letti: {{ $apartment->beds }}
                                            </div>
                                            <div class="service-container">
                                                Bagni: {{ $apartment->bathrooms }}
                                            </div>
                                            <div class="service-container">
                                                Stanze: {{ $apartment->rooms }}
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Da rivedere -->
                                        {{$apartment->amenities}}
                                        <h5>Descrizione</h5>
                                        {{$apartment->description}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="{{ route('Apartment.show', $apartment->id) }}" class="btn btn-outline-info">Dettagli</a> -->

                            <!-- BOTTONE SPONSOR -->
                            <a href="{{ route('Apartment.selectSponsorship', $apartment->id) }}" class="btn btn-warning">Sponsor</a>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<script>

 // Ottieni tutti gli elementi con la classe "mostra-tabella"
 var buttons = document.querySelectorAll(".actionReveal");

// Aggiungi un gestore di eventi a ciascun pulsante
buttons.forEach(function (button) {
    button.addEventListener("click", function () {
        // Ottieni l'ID della tabella target dall'attributo "data-target"
        var targetId = button.getAttribute("data-target");

        // Ottieni l'elemento tabella target
        var table = document.getElementById(targetId);
        table.classList.toggle('d-none');
        button.classList.toggle('text-white')

    });
});



    // // Aggiungi un gestore di eventi al pulsante "Conferma"
    // document.getElementById("confirmDelete").addEventListener("click", () => {
    //    // Qui inserisci il codice per l'eliminazione effettiva dell'elemento
    //    // Puoi utilizzare AJAX, una richiesta HTTP, o qualsiasi altro metodo necessario per l'eliminazione.

    //    // Chiudi la modale dopo l'eliminazione
    //    $("#myModal").modal("hide");
    // });






</script>


    <style>
        .sponsored {
    border: 2px solid gold;
}
    </style>
@endsection

