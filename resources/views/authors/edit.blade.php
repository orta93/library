@extends('layouts.main')

@section('title')
Editar el autor
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Editar el autor</h3>
    </div>

    <form role="form" method="POST" action="/authors/{{ $author->id }}/update">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nombre del autor</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $author->name) }}" placeholder="Ingrese el nombre del autor"/>
        </div>
        <div class="form-group">
            <label for="last_name">Apellido del autor</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $author->last_name) }}" placeholder="Ingrese el apellido del autor"/>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Editar autor</button>
        <a href="/authors" class="btn btn-default">Cancelar</a>
    </div>
    </form>
</div>
@stop