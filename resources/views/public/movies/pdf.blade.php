@extends('layouts.pure')

@section('title','Film')
@section('content')
    <div class="align-content-center">
        <h3>{{ $movie->title }}</h3>
        <p>
            Autor: {{$movie->author->name}}
            <br>
            Preis: {{ $movie->price}}
        </p>
        <br>
        @if($movie->image)
            <img src="{{ asset('/storage/images/' . $movie->image) }}">
        @endif
    </div>
@endsection
