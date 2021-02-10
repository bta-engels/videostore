@extends('layouts.default')

@section('title','Todos')
@section('header','Todos')

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
                    <th>Done</th>
                    <th>Text</th>
                    <th>Erstellt</th>
                    <th>Bearbeitet</th>
                </tr>
                <!-- table data -->
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><i class="fas fa-{{ $item->done ? 'check' : 'times'}}"></i></td>
                        <td>
                            <a href="{{ route('todos.show', ['todo' => $item->id]) }}">{{ $item->text }}</a>
                        </td>
                        <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $item->updated_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <!-- wenn nicht, dann ausgeben: keine daten vorhanden -->
            <h3>Keine Daten vorhanden</h3>
        @endif
    </div>
@endsection
