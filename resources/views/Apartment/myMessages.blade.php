@extends('layouts.app')
@section('content')
<h1>hello world</h1>
@foreach ($messages as $message)
<ul>
    <pre>{{$message}}</pre>
    <li>
        {{$message->SenderEmail}}
    </li>
    <li>
        {{$message->Content}}
    </li>
</ul>



            @endforeach





@endsection
