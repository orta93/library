@extends('layouts.main')

@section('title')
Listado de autores
@stop

@section('actions')
    <div class="container row">
        <a href="/authors/create" class="col-xs-12 col-md-4 btn btn-success">Crear un autor</a>
        <div class="form-group col-xs-12 col-md-4">
            <form method="get" action="/authors">
                <select name="trashed" onchange="this.form.submit()" class="form-control">
                    <option value="0" @if($trashed == false) {{ 'selected' }} @endif>Sin eliminados</option>
                    <option value="1" @if($trashed == true) {{ 'selected' }} @endif>Con eliminados</option>
                </select>
            </form>
        </div>
    </div>
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
            @if(is_null($author->deleted_at))
                <td><a href="/authors/{{ $author->id }}/edit">Editar</a></td>
                <td>
                    <form id="delete_author_{{ $author->id }}" method="post" action="/authors/{{ $author->id }}/delete">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('delete_author_{{ $author->id }}').submit();">Eliminar</a>
                    </form>
                </td>
            @else
                <td colspan="2">
                    <form id="restore_author_{{ $author->id }}" method="post" action="/authors/{{ $author->id }}/restore">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('restore_author_{{ $author->id }}').submit();">Restaurar</a>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach

        @if(!count($authors))
        <tr>
            <td colspan="4" class="text-center">No hay autores</td>
        </tr>
        @endif
    </tbody>
</table>
@stop