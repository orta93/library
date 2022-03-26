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

Route::group(['prefix' => '/books'], function () {
    Route::get('/', 'BookController@index'); // Mostrar todos
    Route::get('/create', 'BookController@create'); // Crear un book
    Route::post('/save', 'BookController@save'); // Guardar un book nuevo
    Route::get('/{id}', 'BookController@show'); // Mostrar el id indicado
    Route::get('/{id}/edit', 'BookController@edit'); // Mostrar el formulario de edición del book seleccionado
    Route::post('/{id}/update', 'BookController@update'); // Guardar los datos de edición del book seleccionado
    Route::post('/{id}/delete', 'BookController@delete'); // Eliminar un book
    Route::post('/{id}/restore', 'BookController@restore'); // Restaurar un book
});

Route::group(['prefix' => '/authors'], function () {
    Route::get('/', 'AuthorController@index'); // Mostrar todos
    Route::get('/create', 'AuthorController@create'); // Crear un author
    Route::post('/save', 'AuthorController@save'); // Guardar un author nuevo
    Route::get('/{id}', 'AuthorController@show'); // Mostrar el id indicado
    Route::get('/{id}/edit', 'AuthorController@edit'); // Mostrar el formulario de edición del author seleccionado
    Route::post('/{id}/update', 'AuthorController@update'); // Guardar los datos de edición del author seleccionado
    Route::post('/{id}/delete', 'AuthorController@delete'); // Eliminar un author
    Route::post('/{id}/restore', 'AuthorController@restore'); // Restaurar un author
});

Route::group(['prefix' => '/editorials'], function () {
    Route::get('/', 'EditorialController@index'); // Mostrar todos
    Route::get('/create', 'EditorialController@create'); // Crear un editorial
    Route::post('/save', 'EditorialController@save'); // Guardar un editorial nuevo
    Route::get('/{id}', 'EditorialController@show'); // Mostrar el id indicado
    Route::get('/{id}/edit', 'EditorialController@edit'); // Mostrar el formulario de edición del editorial seleccionado
    Route::post('/{id}/update', 'EditorialController@update'); // Guardar los datos de edición del editorial seleccionado
    Route::post('/{id}/delete', 'EditorialController@delete'); // Eliminar un editorial
    Route::post('/{id}/restore', 'EditorialController@restore'); // Restaurar un editorial
});

/*Route::get('/authors', 'AuthorController@index');
Route::get('/authors/{id}/edit','AuthorController@edit');

Route::get('/editorials', 'BookController@editorials');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
