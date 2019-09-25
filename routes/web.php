<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/livros', 'LivroController@index');
Route::get('/livros/adicionar', 'LivroController@create')->name('viewAdicionaLivro');
Route::post('/livros/adicionar', 'LivroController@store')->name('storeLivro');
Route::delete('/livros/{id}', 'LivroController@destroy')->name('deletaLivro');
Route::delete('/livros/esvaziar/', 'LivroController@destroy');

Route::get('/autor',  'AutorController@index')->name('mostra_autores');
Route::post('/autor', 'AutorController@store')->name('cadastra_autor');
Route::post('/autor/{id}', 'AutorController@destroya')->name('deleta_autor');

Route::get('/capitulos',  'CapituloController@index')->name('mostra_capitulos');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

