@extends('layouts.default')

@section('title','Filme')
@section('header','Filme')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{ route('movies.create') }}">
            <i class="fas fa-plus-square"></i>Create new Movie</a>
    </div>
    <div class="mt-3">

        {{ $data->links() }}

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Titel</th>
                <th>Preis</th>
                <th colspan="2"><br></th>
            </tr>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->author->name}}</td>
                    <td><a class="link" href="{{ route('movies.show', ['movie' => $item->id]) }}">
                            {{ $item->title }} </a></td>
                    <td>{{$item->price}}</td>
                    <td><a role="button" class="btn-sm btn-primary"
                           href="{{ route('movies.edit', ['movie' => $item->id]) }}"><i class="fas fa-edit"></i>Edit</a></td>
                    <td><a role="button" class="btn-sm btn-danger"
                           onclick="return confirm('Datensatz wirklich löschen?')"
                           href="{{ route('movies.destroy', ['movie' => $item->id]) }}"><i class="fas fa-trash-alt"></i>Löschen</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

