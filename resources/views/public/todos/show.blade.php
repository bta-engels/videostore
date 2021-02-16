@extends('layouts.default')

@section('title','Todo')
@section('header','Todo')

@section('content')
    <div class="align-content-center">
        <h5><i class="mr-3 fas fa-{{ $todo->done ? 'check' : 'times' }}"></i>{{ $todo->text }}</h5>
    </div>
@endsection
