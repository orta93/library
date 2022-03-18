<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::all();
        return view('authors.index')->with(['authors' => $authors]);
    }

    public function show(Request $request, $id)
    {
        $author = Author::find($id);

        if ($author) {
            return view('authors.show')->with([
                'author' => $author
            ]);
        }
        
        return redirect()->to('/authors');
    }

    public function create()
    {
        return view('authors.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellido' => 'required'
        ]);

        $author = Author::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('apellido'),
        ]);

        if ($author) {
            return redirect()->to('/authors');
        } else {
            return redirect()->to('/authors/create');
        }
    }

    public function edit(Request $request, $id)
    {
        $author = Author::find($id);
        //$author = Author::where('id', $id)->first();

        if ($author) {
            return view('authors.edit')->with([
                'author' => $author
            ]);
        }
        
        return redirect()->to('/authors');
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if ($author) {
            /**Option 1. Using functions */
            /*$author->name = $request->get('name');
            $author->last_name = $request->get('last_name');

            if ($author->save()) {
                return redirect()->to('/authors');
            }*/

            /**Option 2. Using eloquent */
            $save = Author::where('id', '=', $id)->update([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name'),
            ]);

            if ($save) {
                return redirect()->to('/authors');
            }

            //$save = Author::where('id', $id)->update($request->except('_token'));
        }
        
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        return "Eliminando author";
    }
}
