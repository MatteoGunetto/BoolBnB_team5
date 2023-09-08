@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link link-danger" href="{{ route('Apartment.index') }}">Home</a>
                    </li>
                    <!-- La rotta che porta alla lista degli appartamenti degli utenti loggati è da rivedere, la lascio vuota -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Apartment.myApartments') }}">I tuoi appartamenti</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('Apartment.create') }}">Aggiungi un appartamento</a>
                    </li>
                    {{-- <li>
                        <a class="nav-link" href="{{ route('Apartment.edit') }}">Modifica un appartamento</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
@endsection
