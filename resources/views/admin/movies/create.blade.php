@extends('layouts.default')
@section('title','Create Author')
@section('header','Create Author')

@section('content')
    <x-form :action="route('authors.store')">
        <select name="author_id">
            <option value="1">Film 1</option>
            <option value="2">Film 2</option>
        </select>
        <x-form-input name="firstname" label="Vorname" />
        <x-form-input name="lastname" label="Nachname" />
        <x-form-submit>
            <span>Autor anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
