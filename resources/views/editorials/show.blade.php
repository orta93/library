@extends('layouts.main')

@section('title')
Detalle de Editorial
@stop

@section('content')
<table class="table table-striped table-hover">
    <theader>
        <tr>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
        <tr>
            <td><a href="/editorials/{{ $editorial->id }}">{{ $editorial->name }}</a></td>
            <td><a href="/editorials/{{ $editorial->id }}/edit">Editar</a></td>
            <td>Eliminar</td>
        </tr>
    </tbody>
</table>
@stop