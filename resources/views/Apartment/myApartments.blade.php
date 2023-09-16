@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>I tuoi appartamenti</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($apartments as $apartment)
                <div class="col">
                    <div class="card ">
                       
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
                            
                            <!-- BOTTONE EDIT -->
                            <a href="{{ route('Apartment.edit', $apartment->id) }}" class="btn btn-success">Edit</a>
                        
                            <!-- BOTTONE SPONSOR -->
                            <a href="{{ route('Apartment.selectSponsorship', $apartment->id) }}" class="btn btn-warning">Sponsor</a>

                            <!-- BOTTONE DELETE -->
                            <div>

                                <form class="d-inline" method="POST" action="{{ route('Apartment.destroy', $apartment->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <!-- bottone collegato alla modale -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $apartment->id }}">
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
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


<script>

    // Aggiungi un gestore di eventi al pulsante "Conferma"
    document.getElementById("confirmDelete").addEventListener("click", function () {
       // Qui inserisci il codice per l'eliminazione effettiva dell'elemento
       // Puoi utilizzare AJAX, una richiesta HTTP, o qualsiasi altro metodo necessario per l'eliminazione.

       // Chiudi la modale dopo l'eliminazione
       $("#myModal").modal("hide");
    });

</script>


    </div>

    </div>
@endsection

