<?php namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Editorial;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'editorial'])->get();

        return view('books')->with(['books' => $books]);
    }

    public function show(Request $request, $id)
    {
        return "Mostrando el detalle de {$id}";
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



    public function authors()
    {
        $authors = Author::all();

        dd($authors);
    }

    public function editorials()
    {
        $editorials = Editorial::all();

        dd($editorials);
    }
}