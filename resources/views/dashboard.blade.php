@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection
