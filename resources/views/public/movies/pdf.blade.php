@extends('layouts.pure')

@section('title','Film')
@section('content')
    <div class="align-content-center">
        <h3>{{ $movie->title }}</h3>
        <p>
            @if($movie->author)
                Autor: {{$movie->author->name}}
            @endif
            <br>
            Preis: {{ $movie->price}} Euro
        </p>
        <br>
        <br>
        @if($movie->image)
            <img src="{{ asset('/storage/images/' . $movie->image) }}">
        @endif
    </div>
@endsection
