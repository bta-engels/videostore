@extends('layouts.default')

@section('title','Filme')
@section('header','Filme')

@section('content')
    <div>
        <!-- hier todos tabellarisch darstellen -->
        <!-- if abfrage, ob welche vorhanden sind -->

        @if( $data->count() > 0 )

            {{ $data->links() }}

            <!-- wenn ja, dann tabelle darstellen -->
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Autor</th>
                    <th>Titel</th>
                    <th>Preis</th>
                    <th><br></th>
                </tr>
                <!-- table data -->
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->author ? $item->author->name : null}}</td>
                        <td>
                            <a href="{{ route('movies.show', ['movie' => $item->id]) }}">{{ $item->title }}</a>
                        </td>
                        <td>{{ $item->price }} €</td>
                        <td><a role="button" class="btn-sm btn-primary"
                               href="{{ route('movies.pdf', ['movie' => $item->id]) }}"><i class="far fa-file-pdf"></i>PDF</a></td>

                    </tr>
                @endforeach
            </table>
        @else
            <!-- wenn nicht, dann ausgeben: keine daten vorhanden -->
            <h3>Keine Daten vorhanden</h3>
        @endif
    </div>
@endsection
