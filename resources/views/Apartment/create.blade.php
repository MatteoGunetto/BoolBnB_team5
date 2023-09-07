@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <button type="home" class="btn btn-primary"><a href="/" class=" fw-bold text-light text-decoration-none">HOME</a></button>
            <button type="home" class="btn btn-info"><a href="/Apartment/show" class=" fw-bold text-dark text-decoration-none">appartamenti</a></button>
            <div class="row">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif

                        <!-- form -->
                    <form action="{{ route('Apartment.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo:</label>
                            <input required
                            type="text"
                            name="title"
                            class="form-control"
                            id="title"
                            placeholder="Inserisci titolo"
                            value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione:</label>
                            <textarea type="text"
                            name="description"
                            class="form-control"
                            id="description"
                            rows="6"
                            placeholder="Inserisci descrizione appartamento">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="rooms" class="form-label">Numero stanze:</label>
                            <input required
                            type="number"
                            min="1"
                            name="rooms"
                            class="form-control"
                            id="rooms"
                            placeholder="Inserisci numero stanze"
                            value="{{ old('rooms') }}">
                        </div>
                        <div class="mb-3">
                            <label for="beds" class="form-label">Numero letti:</label>
                            <input required
                            type="number"
                            min="1"
                            name="beds"
                            class="form-control"
                            id="beds"
                            placeholder="Inserisci numero letti"
                            value="{{ old('beds') }}">
                        </div>
                        <div class="mb-3">
                            <label for="bathrooms" class="form-label">Numero bagni:</label>
                            <input required
                            type="number"
                            min="1"
                            name="bathrooms"
                            class="form-control"
                            id="bathrooms"
                            placeholder="Inserisci numero bagni"
                            value="{{ old('bathrooms') }}">
                        </div>
                        <div class="mb-3">
                            <label for="squareMeters" class="form-label"> dimensioni appartamento:</label>
                            <input required
                            type="number"
                            min="1"
                            name="squareMeters"
                            class="form-control"
                            id="squareMeters"
                            placeholder="Inserisci dimensioni in mt quadri "
                            value="{{ old('squareMeters') }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">indirizzo:</label>
                            <input required
                            type="text"
                            name="address"
                            class="form-control"
                            id="address"
                            placeholder="Inserisci indirizzo"
                            value="{{ old('address') }}">
                        </div>










                        {{-- <div class="mb-3">
                            <label for="address" class="form-label">latitudine:</label>
                            <input required
                            type="text"
                            name="latitude"
                            class="form-control"
                            id="latitude"
                            placeholder="Inserisci latitudine"
                            value="{{ old('latitude') }}">
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">longitudine:</label>
                            <input required
                            type="text"
                            name="longitude"
                            class="form-control"
                            id="longitude"
                            placeholder="Inserisci longitudine"
                            value="{{ old('longitude') }}">
                        </div> --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">selezionare immagine:</label>
                            <input required
                            type="file"
                            name="image"
                            class="form-control"
                            id="image"
                            placeholder="selezionare immagine"
                            value="{{ old('image') }}">
                        </div>
                        <!-- amenities -->
                        <div class="mb-3">
                            <label for="amenities" class="form-label">Selezionare servizi aggiuntivi:</label>
                                @foreach ($amenities as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-{{ $amenity->id }}" value="{{ $amenity->id }}">
                                        <label class="form-check-label" for="amenity-{{ $amenity->id }}">
                                            {{ $amenity->name }}
                                        </label>
                                    </div>
                                @endforeach
                        </div>


                        <!-- submit button -->
                        <button type="submit" class="btn btn-primary">Inserisci appartamento</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
