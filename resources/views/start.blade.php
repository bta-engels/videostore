@extends('layouts.default')

{{--Gibt bei @section('title') im default Layout 'Start' aus--}}
{{--Falls Wert hier nicht zugewiesen, wird der in default Layout genutzt --}}
@section('title','Start')
{{--Gibt bei @yield('header') im default.blade 'Startseite' aus--}}
@section('header','Startseite')

@section('content')
    <div>
        <p>Das ist meine coole Startseite</p>
        <p>{{ $globalName }}</p>
        <p>{{ $eva }}</p>
    </div>
@endsection
