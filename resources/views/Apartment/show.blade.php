@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($apartments as $apartment)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="...">
                hgfd
            </div>
        @endforeach
    </div>
@endsection
