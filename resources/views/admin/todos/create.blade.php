@extends('layouts.default')
@section('title','Todo anlegen')
@section('header','Todo anlegen')

@section('content')
    <x-form :action="route('todos.store')">
        <x-form-input name="text" label="Beschreibung" />
        <x-form-input name="done" label="Status" />
        <x-form-submit>
            <span>Todo anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
