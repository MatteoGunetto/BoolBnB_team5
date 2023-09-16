@extends('layouts.app')
@section('content')

<div>
<h1>Benvenuto nella schermata di pagamento</h1>
    <div>
        per procedere con l'attivazione della sponsorizzazione :
        <strong>{{$promotion->title}}</strong>
        <div>
            con la durata di :
            <strong>{{$promotion->durationInDays}}  giorni</strong>

        </div>
        <div>
            al costo di :
            <strong>{{$promotion->cost}}  Euro</strong>

        </div>
        <div>
            per l'appartamento :
            <strong>{{$apartment->title}}</strong>
        </div>
    </div>
</div>


@endsection