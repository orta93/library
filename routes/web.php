<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', 'TestController@hola');

Route::get('/books', 'BookController@index'); // Mostrar todos
Route::get('/books/create', 'BookController@create'); // Crear un book
Route::post('/books/save', 'BookController@save'); // Guardar un book nuevo
Route::get('/books/{id}', 'BookController@show'); // Mostrar el id indicado
Route::get('/books/{id}/edit', 'BookController@edit'); // Mostrar el formulario de edición del book seleccionado
Route::post('/books/{id}/update', 'BookController@update'); // Guardar los datos de edición del book seleccionado
Route::post('/books/{id}/delete', 'BookController@delete'); // Eliminar un book

/*Route::get('/authors', 'AuthorController@index');
Route::get('/authors/{id}/edit','AuthorController@edit');

Route::get('/editorials', 'BookController@editorials');*/
