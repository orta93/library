<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return "Mostrando todos los autores";
    }

    public function create()
    {
        return view('authors.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
        ]);

        $author = Author::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name')
        ]);

        if ($author) {
            return redirect()->to('/authors');
        }

        return abort(500);
    }
}
