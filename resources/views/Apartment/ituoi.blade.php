@extends('layouts.app')
@section('content')
    <div class="container">

        <!-- Elenco case vacanze in evidenza -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($apartments as $apartment)
                <div class="col">
                    <div class="card ">
                        {{-- se l'img è vuota allora mettine una di default --}}
                        @if (!empty($apartment->image))
                            <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top"
                                alt="Apartment Image">
                        @else
                            <img src="{{ asset('storage/default_image.png') }}" class="card-img-top" style="height: 280px "
                                alt="Default Image">
                        @endif
                        <div class="card-body">

                            <h5 class="card-title">{{ $apartment->title }}</h5>

                            <p class="card-text">Location: {{ $apartment->address }}</p>
                            <a href="{{ route('Apartment.show', $apartment->id) }}" class="btn btn-danger">Dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>




    </div>

    </div>
@endsection
