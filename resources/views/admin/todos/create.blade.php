@extends('layouts.default')
@section('title','Create Todo')
@section('header','Create Todo')

@section('content')
    <x-form :action="route('todos.store')">
        <x-form-input name="text" label="Text" />
        <x-form-checkbox name="done" label="Erledigt" />
        <br/>
        <x-form-submit>
            <span>Todo anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
