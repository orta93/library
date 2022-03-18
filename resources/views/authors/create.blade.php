@extends('layouts.main')

@section('title')
Crear un autor
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Crear autor</h3>
    </div>

    <form role="form" method="POST" action="/authors/save">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nombre del autor</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ingrese el nombre del autor"/>
        </div>
        <div class="form-group">
            <label for="last_name">Apellido del autor</label>
            <input type="text" id="last_name" name="apellido" class="form-control" value="{{ old('apellido') }}" placeholder="Ingrese el apellido del autor"/>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Crear autor</button>
        <a href="/authors" class="btn btn-default">Cancelar</a>
    </div>
    </form>
</div>
@stop