@extends('layouts.main')

@section('title')
Listado de Libros
@stop

@section('actions')
    <div class="container row">
        <a href="/books/create" class="col-xs-12 col-md-4 btn btn-success">Crear un libro</a>
    </div>
@stop

@section('content')
<table class="table table-striped table-hover">
    <theader>
        <tr>
            <th>Nombre</th>
            <th>Paginas</th>
            <th>ISBN</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td><a href="/books/{{ $book->id }}">{{ $book->title }}</a></td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->isbn }}</td>
            <td><a href="/authors/{{ $book->author->id }}">{{ $book->author->full_name }}</a></td>
            <td>{{ $book->editorial->name }}</td>
            @if(is_null($book->deleted_at))
                <td><a href="/books/{{ $book->id }}/edit">Editar</a></td>
                <td>
                    <form id="delete_book_{{ $book->id }}" method="post" action="/books/{{ $book->id }}/delete">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('delete_book_{{ $book->id }}').submit();">Eliminar</a>
                    </form>
                </td>
            @else
                <td colspan="2">
                    <form id="restore_book_{{ $book->id }}" method="post" action="/books/{{ $book->id }}/restore">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('restore_book_{{ $book->id }}').submit();">Restaurar</a>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach

        @if(!count($books))
        <tr>
            <td colspan="7" class="text-center">No hay libros</td>
        </tr>
        @endif
    </tbody>
</table>
@stop