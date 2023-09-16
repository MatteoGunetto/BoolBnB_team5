@extends('layouts.app')
@section('content')
  
<h1>Sponsorizza il tuo appartamento!</h1>
<h2>fatti notare su BoolBNB!</h2>

    <div>
        hai selezionato il tuo appartamento: <strong> {{$apartment->title}} </strong>

        <div>
        situato in: <strong>  {{$apartment->address}} </strong>
        </div>

    </div>

    <!-- opzioni sponsorizzazioni/promozioni -->
    <div>
        <ul>
            @foreach ($promotions as $promotion)
            <li>
                <div>
                    titolo: {{$promotion->title}}
                </div>
                <div>
                    costo: {{$promotion->cost}} Euro
                </div>
                <div>
                    durata promozione: {{$promotion->durationInDays}} giorni
                </div>
                <div>
                <a href="{{ route('Apartment.sponsorApartment', ['apartment_id' => $apartment->id, 'promotion_id' => $promotion->id]) }}" class="btn btn-warning">Compra</a>

                </div>

            </li>
            @endforeach
        </ul>

    </div>


@endsection