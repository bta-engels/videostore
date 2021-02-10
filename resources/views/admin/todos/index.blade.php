@extends('layouts.default')

@section('title','Todos')
@section('header','Todos')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{ route('todos.create') }}">
            <i class="fas fa-plus-square"></i>Create new Todo</a>
    </div>
    <div class="mt-3">

        {{ $data->links() }}

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Done</th>
                <th>Text</th>
                <th>Erstellt</th>
                <th>Bearbeitet</th>
                <th colspan="2"><br></th>
            </tr>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><i class="fas fa-{{ $item->done ? 'check' : 'times'}}"></i></td>
                    <td>
                        <a href="{{ route('todos.show', ['todo' => $item->id]) }}">{{ $item->text }}</a>
                    </td>
                    <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $item->updated_at->format('d.m.Y H:i') }}</td>
                    <td><a role="button" class="btn-sm btn-primary"
                           href="{{ route('todos.edit', ['todo' => $item->id]) }}"><i class="fas fa-edit"></i>Edit</a></td>
                    <td><a role="button" class="btn-sm btn-danger"
                           onclick="return confirm('Datensatz wirklich löschen?')"
                           href="{{ route('todos.destroy', ['todo' => $item->id]) }}"><i class="fas fa-trash-alt"></i>Löschen</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

