@extends('layouts.default')

@section('title','Autor')
@section('header','Autor')

@section('content')
    <div class="align-content-center">
{{--        <h5 style="color:darkturquoise"><b>{{ $author->id }}: {{ $author->firstname }} {{ $author->lastname }}</b></h5>--}}
{{--        Rufe __toString-Methode in Author-Model auf --}}
        <h5 style="color:darkturquoise"><b>{{ $author->id }}: {{ $author }}</b></h5>

        <h6>Anzahl Filme: {{ $author->movies->count() }}</h6>
        <h5>Filme:</h5>
        <div>
            <!-- Gib alle movie-Titel des Autoren aus -->
            <ul>
{{--                @foreach($author->movies as $movie)--}}
{{--                <li>{{ $movie->title }}</li>--}}
{{--                @endforeach--}}
                @forelse($author->movies as $movie)
                    <li>{{ $movie->title }}</li>
                    @empty
                    <p>Dieser Autor hat keine Filme</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
