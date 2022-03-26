@extends('layouts.main')

@section('title')
Crear una editorial
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Crear editorial</h3>
    </div>

    <form role="form" method="POST" action="/editorials/save">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nombre del editorial</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ingrese el nombre del editorial"/>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Crear editorial</button>
        <a href="/editorials" class="btn btn-default">Cancelar</a>
    </div>
    </form>
</div>
@stop