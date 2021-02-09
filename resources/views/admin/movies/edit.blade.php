@extends('layouts.default')
@section('title','Edit Movie')
@section('header','Edit Movie')

@section('content')
    <x-form :action="route('movies.update', ['movie' => $movie->id])" enctype="multipart/form-data">
    @bind($movie)
        <x-form-select name="author_id" :options="$authors" />
        <x-form-input name="title" label="Titel" />
        <x-form-input name="price" label="Preis" />
        <x-form-input name="image" label="Bild" type="file" />
        <x-form-submit>
            <span>Film anlegen</span>
        </x-form-submit>
    @endbind
    </x-form>
@endsection
