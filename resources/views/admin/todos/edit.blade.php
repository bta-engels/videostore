@extends('layouts.default')
@section('title','Todo bearbeiten')
@section('header','Todo bearbeiten')

@section('content')
    <x-form :action="route('todos.update', ['todo' => $todo->id])">
    @bind($todo)
        <x-form-input name="text" label="Beschreibung"/>
        <x-form-checkbox name="done" label="erledigt"/>
        <br>
        <x-form-submit>
            <span>Todo speichern</span>
        </x-form-submit>
    @endbind
    </x-form>
@endsection
