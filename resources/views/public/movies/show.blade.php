@extends('layouts.default')

@section('title','Film')
@section('header', $movie->title);

@section('content')
    <div class="align-content-center">
        <h6>Preis: € {{ $movie->price }}</h6>
        <h6>Autor: {{ $movie->author->name }}</h6>
    </div>
@endsection
