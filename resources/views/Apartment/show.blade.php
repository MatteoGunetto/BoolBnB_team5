@extends('layouts.app')
@section('content')

        <h1 class="my-4">{{ $apartment->title }}</h1>

        <div class="row">
            <div class="col">
                <img class="img-responsive" src="{{ asset('storage/' . $apartment->image) }}" alt="...">
            </div>

            

            <div class="col-4 ">
            <iframe 
                class="embed-responsive-item"
                frameborder="0"
                style="border:0" 
                height="300px"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAwWLnZ3JzfvFKPo307-Yq0aYrkNTig4Zk&q={{$apartment->latitude}},{{$apartment->longitude}}" 
                allowfullscreen>
            </iframe>
        </div>
       

        <div class="my-2">
            <div>
                <h3>Host: {{$apartment->user->name}}</h3>
            </div>
            <span>Rooms: {{ $apartment->rooms }} -- </span>
            <span>Beds: {{ $apartment->beds }} -- </span>
            <span>Bathrooms: {{ $apartment->bathrooms }} -- </span>
            <span>Square Meters: {{ $apartment->squareMeters }}</span>
        </div>

        <h2>Description</h2>
        <p>{{ $apartment->description }}.</p>

        {{-- servizi aggiuntivi --}}
        <h3>Cosa troverai</h3>
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group list-group-flush">
                    @foreach ($apartment->amenities as $amenity)
                        <div>

                            <li class="list-group-item"> {!! $amenity->icon !!} {{ $amenity->name }}</li>

                        </div>
                    @endforeach

                </ul>
            </div>
        </div>

    

    <style>
        .img-responsive {
            max-width: 100%;
            height: 300px;
        }
    </style>

@endsection
