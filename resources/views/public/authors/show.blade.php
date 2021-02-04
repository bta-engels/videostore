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
                <li></li>
            </ul>
        </div>
    </div>
@endsection
