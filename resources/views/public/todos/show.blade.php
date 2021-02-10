@extends('layouts.default')

@section('title','Todo')
@section('header',$todo->text)

@section('content')
    <div class="align-content-center">
        <h6>Done : <i class="fas fa-{{ $todo->done ? 'check' : 'times'}}"></i></h6>
    </div>
@endsection
