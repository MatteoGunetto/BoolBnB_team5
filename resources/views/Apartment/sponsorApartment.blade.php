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

<!-- Container di Braintree -->
<div id="dropin-container"></div>
<button id="submit-button">Effettua il pagamento</button>

<script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        braintree.dropin.create({
            authorization: 'YOUR_CLIENT_TOKEN_FROM_SERVER', // Sostituire con il token effettivo ottenuto dal server
            container: document.getElementById('dropin-container'),
            // ...plus remaining configuration (qui puoi inserire ulteriori configurazioni se necessario)
        }).then((dropinInstance) => {
            const button = document.querySelector('#submit-button');
            button.addEventListener('click', function () {
                dropinInstance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }
                    // Qui puoi inviare `payload.nonce` al tuo server per elaborare il pagamento
                });
            });
        }).catch((error) => {
            console.error(error);
        });
    });
</script>

@endsection
