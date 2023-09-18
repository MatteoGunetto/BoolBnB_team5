@extends('layouts.app')
@section('content')
@foreach ($messages as $message)

{{-- <h1>hello world</h1> --}}
{{-- <ul>
    <pre>{{$message}}</pre>
    <li>
        {{$message->SenderEmail}}
    </li>
    <li>
        {{$message->Content}}
    </li>
</ul> --}}
<!-- <pre>{{$message}}</pre> -->
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="heading{{ $message->id }}">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $message->id }}" aria-expanded="true" aria-controls="collapseOne{{ $message->id }}">
                        {{-- {{$apartment->image}} --}}
                        {{$message->SenderEmail}}
                        <br>
                    {{$message->created_at}}
                    </button>
                  </h2>
                  <div id="collapseOne{{ $message->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $message->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>{{$message->Name}}</strong>
                      <p>
                        {{$message->Content}}
                    </p>
                    <br>
                    <p>{{$message->created_at}}</p>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endforeach









@endsection
