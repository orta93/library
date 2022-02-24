<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hola(Request $request)
    {
        //dd($request->all());
        $name = $request->get('name', 'Juan');
        dump($name);

        $has_name = $request->has('name');
        dump($has_name);

        $is_filled = $request->filled('name');
        dump($is_filled);

        return "Que onda {$name}";
    }

    public function index(Request $request)
    {
        return "Mostrando todos los libros";
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
}