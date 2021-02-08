@extends('layouts.default')

@section('title','Autoren')
@section('header','Autoren')

@section('content')
    <div>
        <!-- hier todos tabellarisch darstellen -->
        <!-- if abfrage, ob welche vorhanden sind -->

        @if( count($data) > 0 )
{{--        interne links-Funktion wird durch paginate-Funktion der $data-Variablen zur Verfügung gestellt --}}
{{--        gibt Navigationsblock für Navigation durch Datensätze aus --}}
{{--            {{ $data->links() }}--}}
            <!-- wenn ja, dann tabelle darstellen -->
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <!-- table data -->
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('authors.show', ['author' => $item->id]) }}">{{ $item->firstname }} {{ $item->lastname }}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <!-- wenn nicht, dann ausgeben: keine daten vorhanden -->
            <h3>Keine Daten vorhanden</h3>
        @endif
    </div>
@endsection
