@extends('layouts.default')
@section('title','Edit Todo')
@section('header','Edit Todo')

@section('content')
    <x-form :action="route('todos.update', ['todo' => $todo->id])">
    @bind($todo)
        <x-form-input name="text" label="Text" />
        <x-form-checkbox name="done" label="Done" />
        <br>
        <x-form-submit>
            <span>Todo speichern</span>
        </x-form-submit>
    @endbind
    </x-form>
@endsection
