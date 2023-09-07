@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>{{ $apartment->title }}</h1>

        <img src="{{ asset('storage/' . $apartment->image) }}" alt="...">

        {{-- stanze --}}

        <div>
            <span>{{ $apartment->rooms }} Stanze</span> &middot;
            <span> {{ $apartment->beds }} Letti</span> &middot;
            <span> {{ $apartment->bathrooms }} Bagni</span> &middot;
            <span> {{ $apartment->squareMeters }} mq</span>
        </div>

        {{-- descrizione --}}
        <br>
        <p>{{ $apartment->description }}.</p>

        {{-- servizi aggiuntivi --}}
        <h3>Cosa troverai</h3>

        @foreach ($apartment->amenities as $amenity)
            <span>{{ $amenity->name }}</span>
        @endforeach


    </div>
@endsection
