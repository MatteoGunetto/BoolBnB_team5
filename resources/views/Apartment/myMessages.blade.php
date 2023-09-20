@extends('layouts.app')
@section('content')
<div class="container p-5">
    <h1 class="mb-3">I tuoi messaggi</h1>


@foreach ($messages as $message)

<!-- {{-- <h1>hello world</h1> --}}
{{-- <ul>
    <pre>{{$message}}</pre>
    <li>
        {{$message->SenderEmail}}
    </li>
    <li>
        {{$message->Content}}
    </li>
</ul> --}} -->
<!-- <pre>{{$message}}</pre> -->
<div class="container py-3 px-0">
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="heading{{ $message->id }}">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $message->id }}" aria-expanded="true" aria-controls="collapseOne{{ $message->id }}">
                        {{-- {{$apartment->image}} --}}
                        <div class="img_messaggio me-2">
                            <img src="{{ asset('storage/' . $message->apartment->image) }}" class="card-img-top"
                                    alt="Apartment Image">
                        </div>
                                <p class="m-0"><strong>Appartamento:</strong>  {{ $message->apartment->title }}</p>
                        <span class="w-100 text-end pe-3"> Ricevuto:{{$message->created_at}}</span>
                    </button>
                  </h2>
                  <div id="collapseOne{{ $message->id }}" class="accordion-collapse collapse close" aria-labelledby="heading{{ $message->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-5">
                        <p> <strong>Email visitatore:</strong>  {{$message->SenderEmail}}</p>
                        <p>
                          <strong> Nome:</strong>  {{$message->Name}}
                        </p>
                        <strong>Messaggio:</strong> {{$message->Content}}
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endforeach
</div>









@endsection
