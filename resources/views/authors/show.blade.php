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
@stop