@extends('layouts.main')

@section('title')
Listado de autores
@stop

@section('actions')
<a href="/authors/create" class="btn btn-success">Crear un autor</a>
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
        @foreach($authors as $author)
        <tr>
            <td><a href="/authors/{{ $author->id }}">{{ $author->name }}</a></td>
            <td>{{ $author->last_name }}</td>
            <td><a href="/authors/{{ $author->id }}/edit">Editar</a></td>
            <td>Eliminar</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop