@extends('layouts.app')
@section('content')
    <div class="container">
            <h1>{{$apartment -> title}}</h1>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="...">
                
            </div>

    </div>
@endsection
