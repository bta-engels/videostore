@extends('layouts.default')
@section('title','Create Todo')
@section('header','Create Todo')

@section('content')
    <x-form :action="route('todos.store')" enctype="multipart/form-data">
        <x-form-input name="text" label="Text" />
        <x-form-checkbox name="done" label="Done"/>
        <br>
        <x-form-submit>
            <span>Todo anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
