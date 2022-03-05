@extends('layouts.main')

@section('title')
Crear un libro
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Crear libro</h3>
    </div>

    <form role="form" method="POST" action="/books/save">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="title">Nombre del libro</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Ingrese el nombre del libro"/>
        </div>
        <div class="form-group">
            <label for="pages">Numero de paginas del libro</label>
            <input type="number" id="pages" name="pages" class="form-control" placeholder="Ingrese la cantidad"/>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" class="form-control" placeholder="Ingrese el isbn"/>
        </div>
        <div class="form-group">
            <label for="published_at">Fecha de publicación</label>
            <input type="date" id="published_at" name="published_at" class="form-control" placeholder="Ingrese la fecha de publicación"/>
        </div>
        <div class="form-group">
            <label for="author_id">Seleccione un autor</label>
            <select id="author_id" class="form-control" name="author_id">
                <option>Seleccione un autor</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }} {{ $author->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="editorial_id">Seleccione una editorial</label>
            <select id="editorial_id" class="form-control" name="editorial_id">
                <option>Seleccione una editorial</option>
                @foreach($editorials as $editorial)
                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Crear libro</button>
    </div>
    </form>
</div>
@stop