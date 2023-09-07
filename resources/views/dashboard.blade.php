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
                        <a class="nav-link" href="#">I tuoi appartamenti</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('Apartment.create') }}">Aggiungi un appartamento</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('Apartment.edit') }}">Modifica un appartamento</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Questo è quello che c'era prima -->
    <!-- <div class="container">
                                <h2 class="fs-4 text-secondary my-4">
                                    {{ __('Pannello Utente') }}
                                </h2>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <div class="card">


                                            <div class="card-body">
                                                <a href="../../Apartment/myApartments">My Apartments</a>
                                            </div>
                                            <div>
                                                <button type="home" class="btn btn-info"><a href="/Apartment/create"
                                                        class=" fw-bold text-dark text-decoration-none">Aggiungi appartamento</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
@endsection
