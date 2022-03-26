@extends('layouts.main')

@section('title')
Detalle de Autor
@stop

@section('content')
<table class="table table-striped table-hover">
    <theader>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
        <tr>
            <td><a href="/authors/{{ $author->id }}">{{ $author->name }}</a></td>
            <td>{{ $author->last_name }}</td>
            <td><a href="/authors/{{ $author->id }}/edit">Editar</a></td>
            <td>Eliminar</td>
        </tr>
    </tbody>
</table>


<table class="table table-striped table-hover">
    <theader>
        <tr>
            <th>Nombre</th>
            <th>Paginas</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
    @foreach($author->books as $book)
        <tr>
            <td><a href="/books/{{ $book->id }}">{{ $book->title }}</a></td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->isbn }}</td>
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

    @if(!count($author->books))
        <tr>
            <td colspan="6" class="text-center">No hay libros</td>
        </tr>
    @endif
    </tbody>
</table>
@stop