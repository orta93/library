<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $books = Book::with(['author', 'editorial'])->get();

        return view('books.index')->with([
            'books' => $books
        ]);
    }

    public function show(Request $request, $id)
    {
        $book = Book::with(['author', 'editorial'])->where('id', $id)->first();

        if ($book) {
            return view('books.show')->with([
                'book' => $book
            ]);
        }
        
        return redirect()->to('/books');
    }

    public function create()
    {
        $authors = Author::withTrashed()->get();
        $editorials = Editorial::withTrashed()->get();
        return view('books.create')->with([
            'authors' => $authors,
            'editorials' => $editorials
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pages' => 'required',
            'isbn' => 'required',
            'author_id' => 'required',
            'published_at' => 'required|date',
            'editorial_id' => 'required',
        ]);

        $book = Book::create($request->except('_token'));

        if ($book) {
            return redirect()->to('/books');
        } else {
            return redirect()->to('/books/create');
        }
    }

    public function edit(Request $request, $id)
    {
        $book = Book::find($id);
        //$book = Book::where('id', $id)->first();

        if ($book) {
            return view('books.edit')->with([
                'book' => $book
            ]);
        }
        
        return redirect()->to('/books');
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($book) {
            /**Option 1. Using functions */
            /*$book->name = $request->get('name');

            if ($book->save()) {
                return redirect()->to('/books');
            }*/

            /**Option 2. Using eloquent */
            $save = Book::where('id', '=', $id)->update([
                'name' => $request->get('name'),
            ]);

            if ($save) {
                return redirect()->to('/books');
            }

            //$save = Book::where('id', $id)->update($request->except('_token'));
        }
        
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $book = Book::find($id);

        if ($book) {
            /** Option 1. Using functions */
            $book->delete();

            /** Option 2. Using eloquent */
//            Book::where('id', $id)->delete();
        }

        return redirect()->back();
    }

    public function restore(Request $request, $id)
    {
        $book = Book::withTrashed()->where('id', $id)->first();
        if ($book) {
            $book->restore();
        }

        return redirect()->back();
    }
}
