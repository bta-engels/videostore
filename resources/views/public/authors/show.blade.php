@extends('layouts.default')

@section('title','Autor')
@section('header','Autor')

@section('content')
    <div class="align-content-center">
        <h5>{{ $author->firstname }} </h5>
        <div></div>
    </div>
@endsection
