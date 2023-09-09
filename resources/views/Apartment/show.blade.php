@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="my-4">{{ $apartment->title }}</h1>

        <div class="row">
            <div class="col">
                @if (!empty($apartment->image))
                    <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="Apartment Image">
                @else
                    <img src="{{ asset('storage/default_image.png') }}" class="card-img-top" alt="Default Image">
                @endif
            </div>
        </div>

        {{-- stanze --}}
        <section class="my-2">
            <div>
                <h3>Host: {{ $apartment->user->name }}</h3>
            </div>
            <span>Rooms: {{ $apartment->rooms }} &middot; </span>
            <span>Beds: {{ $apartment->beds }} &middot; </span>
            <span>Bathrooms: {{ $apartment->bathrooms }} &middot; </span>
            <span>{{ $apartment->squareMeters }} mq</span>
        </section>

        {{-- descrizione e mappa --}}
        <section class="row justify-content-between">
            <div class="col-lg-7">
                <h2>Description</h2>
                <p>{{ $apartment->description }}.</p>
            </div>
            {{-- mappa --}}
            <div class="col text-end ">
                <iframe class="embed-responsive-item" frameborder="0" style="border:0" height="300px"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAwWLnZ3JzfvFKPo307-Yq0aYrkNTig4Zk&q={{ $apartment->latitude }},{{ $apartment->longitude }}"
                    allowfullscreen>
                </iframe>
            </div>
        </section>

        {{-- servizi aggiuntivi --}}
        <section>
            <h3>Cosa troverai</h3>
            <div class="row py-4">
                <div class="col-lg-3">
                    <ul class="list-group list-group-flush">
                        {{-- se non ci sono servizi allora non metterli --}}
                        @if (count($apartment->amenities) > 0)
                            @foreach ($apartment->amenities as $amenity)
                                <div>
                                    <li class="list-group-item"> {!! $amenity->icon !!} {{ $amenity->name }}</li>
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
        @if (session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('message.store', $apartment) }}">
            @csrf
            <label for="SennderEmail">Email:</label>
            <input type="SenderEmail" name="SenderEmail" required><br>

            <label for="Name">Nome:</label>
            <input type="text" name="Name" required><br>

            <label for="Content">Contenuto:</label>
            <input type="text" name="Content" required>


            <button type="submit">Invia</button>
        </form>


    </div>





    <style>
        img {
            max-width: 100%;
            height: 550px;
            object-fit: contain;
        }
    </style>
@endsection
