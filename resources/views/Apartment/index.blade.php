@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>APARTMENT INDEX</h1>
        @foreach ($apartments as $apartment)
            <h5>{{ $apartment->title }}</h5>
            <img width="250px" height="350px" src="{{ asset('storage/' . $apartment->image) }}" alt="">
        @endforeach

    </div>
@endsection
