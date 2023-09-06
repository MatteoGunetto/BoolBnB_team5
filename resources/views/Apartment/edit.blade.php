@extends('layouts.app')
@section('content')


<div class="container text-center">
    <h1>
        Modifica Appartamento
    </h1>
    <form action="{{ route('Apartment.update', $apartment->id}}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" name="title" id="title" value="{{ $apartment -> title }}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea name="description" id="description" class="form-control">"{{ $apartment->description }}"</textarea>
        </div>

        <div class="form-group">
            <label for="rooms">Stanze:</label>
            <input type="number" id="rooms" name="rooms" class="form-control" value="{{ $apartment->rooms }}">
        </div>

        <div class="form-group">
            <label for="beds">Posti letto:</label>
            <input type="number" id="beds" name="beds" class="form-control" value="{{ $apartment->beds }}">
        </div>

        <div class="form-group">
            <label for="bathrooms">Bagni:</label>
            <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ $apartment->rooms }}">
        </div>

        <div class="form-group">
            <label for="squareMeters">Superficie:</label>
            <input type="text" id="squareMeters" name="squareMeters" class="form-control" value="{{ $apartment->squareMeters }}">
        </div>

        <div class="form-group">
            <label for="address">Indirizzo:</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $apartment->address }}">
        </div>

        <div class="form-group">
            <label for="latitude">Latitudine:</label>
            <input type="number" id="latitude" name="latitude" class="form-control" value="{{ $apartment->latitude }}">
        </div>

        <div class="form-group">
            <label for="longitude">Latitudine:</label>
            <input type="number" id="longitude" name="longitude" class="form-control" value="{{ $apartment->longitude }}">
        </div>

        <div class="form-group">
            <label for="image">Scegli un'immagine</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="visible">Visibile:</label>
            <select name="visible" class="form-control">
                <option value="1" {{ $apartment->visible == 1 ? 'selected' : '' }}>Sì</option>
                <option value="0" {{ $apartment->visible == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
</div>


@endsection