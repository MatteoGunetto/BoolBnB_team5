@extends('layouts.app')
@section('content')

{{-- side bar --}}
            <div class="dash-nav bg-primary p-md-4 py-4 vh-100" id="sidebar" style="--bs-bg-opacity: .8;">
                <ul class="nav flex-column  gap-2">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('Apartment.myApartments') }}">
                            <i class="bi bi-house me-md-2"></i><span>Appartamenti</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('Apartment.myMessages') }}">
                            <i class="bi bi-envelope-paper me-md-2"></i> <span>Messagi</span>
                        </a>
                    </li>
                </ul>
            </div>

<div class="content p-5">

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h1>Sponsorizza il tuo appartamento!</h1>
            <h2 >fatti notare su BoolBNB!</h2>

            <div>
                hai selezionato il tuo appartamento: <strong> {{$apartment->title}} </strong>

                <div>
                    situato in: <strong>  {{$apartment->address}} </strong>
                </div>

            </div>
        </div>
        @foreach ($promotions as $promotion)
        <div class="col-lg-4 mb-lg-0 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$promotion->title}}</h5>
                    <p class="card-text">{{$promotion->cost}} €</p>
                    <p> Giorni: {{$promotion->durationInDays}}</p>
                    <a href="{{ route('Apartment.sponsorApartment', ['apartment_id' => $apartment->id, 'promotion_id' => $promotion->id]) }}" class="btn btn-warning">Compra</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection