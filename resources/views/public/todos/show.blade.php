@extends('layouts.default')

@section('title','Todo')
@section('header', $todo->text)

@section('content')
    <div class="align-content-center">
        <h5>ID: {{ $todo->id }}</h5>
        <h6>Status: <i class="fas fa-{{ $todo->done ? 'check' : 'times' }}"></i></h6>
        <h6>Angelegt: {{ $todo->created_at->format('d.m.Y H:i')}}</h6>
        <h6>Bearbeitet: {{ $todo->updated_at->format('d.m.Y H:i')}}</h6>
    </div>
@endsection
