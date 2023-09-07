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
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group list-group-flush">
                    @foreach ($apartment->amenities as $amenity)
                        <div>
                            <li class="list-group-item">{{ $amenity->name }}</li>
                            <span>{!! $amenity->icon !!}</span>
                        </div>
                    @endforeach

                </ul>
            </div>
        </div>

    </div>
@endsection
