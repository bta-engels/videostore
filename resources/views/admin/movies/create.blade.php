@extends('layouts.default')
@section('title','Create Movie')
@section('header','Create Movie')

@section('content')
{{--    enctype-Attribut lässt zu, dass zusätzlivhe Dateien geladen werden--}}
    <x-form :action="route('movies.store')" enctype="multipart/form-data">
{{--        Lege ein drop-down-Menü mit $authors als Optionen an--}}
        <x-form-select name="author_id" :options="$authors" />
        <x-form-input name="title" label="Titel" />
        <x-form-input name="price" label="Preis" />
{{--        type by default ist Textfeld, hier: file--}}
        <x-form-input name="image" label="Bild" type="file" />
        <x-form-submit>
            <span>Film anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
