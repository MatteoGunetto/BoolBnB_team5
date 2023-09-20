@extends('layouts.app')
@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mb-3">Benvenuto nella schermata di pagamento</h1>
            <div>
        per procedere con l'attivazione della sponsorizzazione :
        <strong>{{$promotion->title}}</strong>
        <div>
            con la durata di :
            <strong>{{$promotion->durationInDays}} giorni</strong>
        </div>
        <div>
            al costo di :
            <strong>{{$promotion->cost}} Euro</strong>
        </div>
        <div>
            per l'appartamento :
            <strong>{{$apartment->title}}</strong>
        </div>
    </div>
        </div>








<form action="{{ route('Apartment.payPromotion') }}" method="POST">
    @csrf
    <div>
        <label>Numero Carta:</label>
        <input required type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror" placeholder="1234 5678 1234 5678" >
        @error('card_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div>
        <label>Data di Scadenza:</label>
        <input required type="text" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" placeholder="MM/AA">
        @error('expiry_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div>
        <label>CVV:</label>
        <input required type="text" class="form-control @error('cvv') is-invalid @enderror" name="cvv" placeholder="123">
        @error('cvv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div>
        <label>Quando vuoi far partire la promozione?</label>
        <input required type="datetime-local" name="startDate" placeholder="">
    </div>
    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
    <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">

    <div>
        <button id="submit-button" class="button button--small button--green">Purchase</button>
    </div>
</form>




</script>
        </div>
    </div>
</div>
<div>
</div>



<style>
    .button {
        cursor: pointer;
        font-weight: 500;
        left: 3px;
        line-height: inherit;
        position: relative;
        text-decoration: none;
        text-align: center;
        border-style: solid;
        border-width: 1px;
        border-radius: 3px;
        -webkit-appearance: none;
        -moz-appearance: none;
        display: inline-block;
    }

    .button--small {
        padding: 10px 20px;
        font-size: 0.875rem;
    }

    .button--green {
        outline: none;
        background-color: #64d18a;
        border-color: #64d18a;
        color: white;
        transition: all 200ms ease;
    }

    .button--green:hover {
        background-color: #8bdda8;
        color: white;
    }
</style>

@endsection
