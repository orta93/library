@extends('layouts.main')

@section('title')
Detalle de Libro
@stop

@section('content')
<table class="table table-striped table-hover">
    <theader>
        <tr>
            <th>Titulo</th>
            <th>Paginas</th>
            <th>ISBN</th>
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->isbn }}</td>
            <td><a href="/books/{{ $book->id }}/edit">Editar</a></td>
            <td>Eliminar</td>
        </tr>
    </tbody>
</table>
@stop