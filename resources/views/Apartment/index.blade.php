@extends('layouts.app')
@section('content')


<div class="container">
    <!-- Ricerca avanzata -->
    <form class="form-inline ml-auto my-5">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cerca un appartamento per le tue vacanze" aria-label="Cerca...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Cerca</button>
            </div>
        </div>
    </form>

    <!-- Elenco case vacanze in evidenza -->
    <h1 class="mt-4">Case Vacanze in Evidenza</h1>

    <div class="card-deck mt-3">
        @foreach ($apartments as $apartment)
        <div class="card">
            <img src="{{ $apartment->image_url }}" class="card-img-top" alt="{{ $apartment->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $apartment->title }}</h5>
                <p class="card-text">{{ $apartment->description }}</p>
                <p class="card-text">Location: {{ $apartment->address }}</p>
                <a href="{{ route('Apartment.show', $apartment->id) }}" class="btn btn-primary">Dettagli</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
