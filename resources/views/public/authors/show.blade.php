@extends('layouts.default')

@section('title','Autor')
@section('header','Autor')

@section('content')
    <div class="align-content-center">
        <h5>{{ $author->id }} {{ $author->firstname }} {{ $author->lastname }}</h5>
        <h6>Anzahl Filme: {{ $author->movies->count() }}</h6>
        <div>
            <!-- gib alle movie titel aus -->
            <ul>
                @forelse($author->movies as $movie)
                    <li>{{ $movie->title }}</li>
                @empty
                    <p>Keine Filme</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
