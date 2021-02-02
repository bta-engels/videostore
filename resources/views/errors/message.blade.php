@extends('layouts.default')
@section('title','Fehler')
@section('header','Fehler')

@section('content')
    <div>
        <p class="text-danger font-weight-bold">
            @if( isset($message) )
                {{$message}}
            @endif
        </p>
        <h1 style="color:greenyellow; font-weight:bold">Ätsch!</h1>
    </div>
@endsection
