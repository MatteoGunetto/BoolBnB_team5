@extends('layouts.app')
@section('content')
    <div class="container">

        <!-- titolo -->

        <div>
            <h1 class="my-4">Nome appartamento: {{ $apartment->title }}</h1>
        </div>
        
        <!-- indirizzo -->
        <h3 class="my-1">Location: {{ $apartment->address }}</h3>

        <!-- immagine -->
        <div class="row">
            <div class="col">
                @if (!empty($apartment->image))
                    <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="Apartment Image">
                @else
                    <img src="{{ asset('storage/default_image.png') }}" class="card-img-top" alt="Default Image">
                @endif
            </div>
        </div>

        <!-- host -->
        <div class="my-3">
            <h3>Host: {{ $apartment->user->name }}</h3>
        </div>

        <!-- caratteristiche -->
        <section class="my-3">
            <span>Rooms: {{ $apartment->rooms }} &middot; </span>
            <span>Beds: {{ $apartment->beds }} &middot; </span>
            <span>Bathrooms: {{ $apartment->bathrooms }} &middot; </span>
            <span>{{ $apartment->squareMeters }} mq</span>
        </section>

        <!-- descrizione -->
        <div class="my-3">
            <h3>Description</h3>
            <p>{{ $apartment->description }}.</p>
        </div>

   
        <div class="row my-3">

            <!-- servizi aggiuntivi -->
            <section class="col-6">
                <h3>Servizi aggiuntivi:</h3>
                <div class="row py-4">
                    <div class="col-lg-6">
                        <ul class="list-group list-group-flush">
                            {{-- se non ci sono servizi allora non metterli --}}
                            @if (count($apartment->amenities) > 0)
                                @foreach ($apartment->amenities as $amenity)
                                    <div>
                                    
                                        <li class="list-group-item"><i class="fa {{ $amenity->icon }}"></i> {{ $amenity->name }}</li>

                                    </div>
                                @endforeach
                            @else
                                <!-- Nessuna amenità disponibile -->
                                <span class="text-secondary">Servizi non disponibili al momento</span>
                            @endif
                        </ul>
                    </div>
                </div>
            </section>

            <!-- mappa -->
            <div class="col-6">
                <iframe class="embed-responsive-item" frameborder="0" style="border:0" height="100%" width="100%"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAwWLnZ3JzfvFKPo307-Yq0aYrkNTig4Zk&q={{ $apartment->latitude }},{{ $apartment->longitude }}"
                    allowfullscreen>
                </iframe>
            </div>

        </div>
  


        @if (session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

    </div>

    <style>
        img {
            max-width: 100%;
            height: 550px;
            object-fit: contain;
        }
    </style>
@endsection
