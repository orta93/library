@extends('layouts.main')

@section('title')
Crear un Libro
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
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Ingrese el nombre del libro"/>
        </div>
        <div class="form-group">
            <label for="pages">Paginas del libro</label>
            <input type="number" id="pages" name="pages" class="form-control" value="{{ old('pages') }}" placeholder="Ingrese la cantidad de paginas del libro"/>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN del libro</label>
            <input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}" placeholder="Ingrese el ISBN del libro"/>
        </div>
        <div class="form-group">
            <label for="published_at">Fecha de publicacion libro</label>
            <input type="date" id="published_at" name="published_at" class="form-control" value="{{ old('published_at') }}" placeholder="Ingrese la fecha de publicacion del libro"/>
        </div>
        <div class="form-group">
            <label for="author_id">Autor</label>
            <select id="author_id" name="author_id" class="form-control">
                <option>Seleccione un autor</option>

                @foreach($authors as $author)
                    <option value="{{ $author->id }}" @if(intval(old('author_id')) == $author->id) selected @endif>{{ $author->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="editorial_id">Editorial</label>
            <select id="editorial_id" name="editorial_id" class="form-control">
                <option>Seleccione una editorial</option>

                @foreach($editorials as $editorial)
                    <option value="{{ $editorial->id }}" @if(intval(old('editorial_id')) == $editorial->id) selected @endif>{{ $editorial->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Crear libro</button>
        <a href="/books" class="btn btn-default">Cancelar</a>
    </div>
    </form>
</div>
@stop