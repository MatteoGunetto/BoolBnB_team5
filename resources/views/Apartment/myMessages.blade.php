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
    <h1 class="mb-3">I tuoi messaggi</h1>


@foreach ($messages as $message)

    <div class="container py-3 px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="heading{{ $message->id }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $message->id }}" aria-expanded="true" aria-controls="collapseOne{{ $message->id }}">
                            {{-- {{$apartment->image}} --}}
                            <div class="img_messaggio d-flex align-items-center w-100 mb-md-2">
                                <img src="{{ asset('storage/' . $message->apartment->image) }}" class="card-img-top"
                                        alt="Apartment Image">
                                        <p class="ms-2 mb-0"><strong>Appartamento:</strong><br>  {{ $message->apartment->title }}</p>
                            </div>
                            <div class="w-100 text-end pe-3">
                                <span class="w-100"> Ricevuto:{{$message->created_at}}</span>
                            </div>
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
