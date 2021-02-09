@extends('layouts.default')
@section('title','Create Movie')
@section('header','Create Movie')

@section('content')
    <x-form :action="route('movies.store')" enctype="multipart/form-data">
        <x-form-select name="author_id" :options="$authors" />
        <x-form-input name="title" label="Titel" />
        <x-form-input name="price" label="Preis" />
        <x-form-input name="image" label="Bild" type="file" />
        <x-form-submit>
            <span>Film anlegen</span>
        </x-form-submit>
    </x-form>
@endsection
