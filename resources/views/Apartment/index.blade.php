@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>APARTMENT INDEX</h1>
        <div class="row row-cols-3">
            @foreach ($apartments as $apartment)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">{{ $apartment->description }}.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">N.Stanze: {{ $apartment->rooms }}</li>
                        <li class="list-group-item">N.Letti: {{ $apartment->beds }}</li>
                        <li class="list-group-item">N.Bagni: {{ $apartment->bathrooms }}</li>
                        <li class="list-group-item">{{ $apartment->squareMeters }} mq</li>
                    </ul>
                    {{-- <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div> --}}
                </div>
            @endforeach
        </div>

    </div>
@endsection
