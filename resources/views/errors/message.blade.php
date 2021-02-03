@extends('layouts.default')
@section('title','Fehler')
@section('header','Fehler')

@section('content')
    <div>
        <p class="text-danger font-weight-bold">
{{--        Falls Variable message gesetzt, wird diese ausgegeben--}}
            @if( isset($message) )
{{--            HTML tags im web.php werden als solche genutzt durch Notation mit {!! ... !!}--}}
                {!! $message !!}
            @endif
        </p>
        <h1 style="color:greenyellow; font-weight:bold">Ätsch!</h1>
    </div>
@endsection
