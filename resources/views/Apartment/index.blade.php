@extends('layouts.app')
@section('content')
<div class="container">

    <!-- Barra di navigazione -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BoolBNB</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Apartment.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Apartment.show') }}">I tuoi appartamenti</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('Apartment.create') }}">Aggiungi un appartamento</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('Apartment.edit') }}">Modifica un appartamento</a>
                </li>
                <li>
                    <a class="nav-link" href="pagamento">Metti in evidenza</a>
                </li>
            </ul>
            <!-- Ricerca avanzata -->
            <form class="form-inline ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cerca..." aria-label="Cerca...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Cerca</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>

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

    <!-- Questa parte l'ha fatta Matte, chiedi prima di toccarla -->
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