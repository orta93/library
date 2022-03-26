@extends('layouts.main')

@section('title')
Listado de editoriales
@stop

@section('actions')
    <div class="container row">
        <a href="/editorials/create" class="col-xs-12 col-md-4 btn btn-success">Crear un editorial</a>
        <div class="form-group col-xs-12 col-md-4">
            <form method="get" action="/editorials">
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
            <th colspan="2">Acciones</th>
        </tr>
    </theader>
    <tbody>
        @foreach($editorials as $editorial)
        <tr>
            <td><a href="/editorials/{{ $editorial->id }}">{{ $editorial->name }}</a></td>
            @if(is_null($editorial->deleted_at))
                <td><a href="/editorials/{{ $editorial->id }}/edit">Editar</a></td>
                <td>
                    <form id="delete_editorial_{{ $editorial->id }}" method="post" action="/editorials/{{ $editorial->id }}/delete">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('delete_editorial_{{ $editorial->id }}').submit();">Eliminar</a>
                    </form>
                </td>
            @else
                <td colspan="2">
                    <form id="restore_editorial_{{ $editorial->id }}" method="post" action="/editorials/{{ $editorial->id }}/restore">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('restore_editorial_{{ $editorial->id }}').submit();">Restaurar</a>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach

        @if(!count($editorials))
        <tr>
            <td colspan="4" class="text-center">No hay editoriales</td>
        </tr>
        @endif
    </tbody>
</table>
@stop