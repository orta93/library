<?php namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Editorial;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index');
    }

    public function show(Request $request, $id)
    {
        return "Mostrando el detalle de {$id}";
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $editorials = Editorial::orderBy('name')->get();
        return view('books.create')->with([
            'authors' => $authors,
            'editorials' => $editorials
        ]);
    }

    public function save(Request $request)
    {
        $book = $request->except('_token');
        dd($book);
        return "Guardando el registro de book";
    }

    public function edit(Request $request, $id)
    {
        return "Mostrando el formulario de edición de {$id}";
    }

    public function update(Request $request, $id)
    {
        dd($request->get('testing'));
        return "Guardando cambios de {$id}";
    }

    public function delete(Request $request, $id)
    {
        return "Eliminando book";
    }
}