<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/panel', function () {
    return view('panel.main');
});

/*Usuarios*/
Route::resource('/panel/usuarios', 'panel\UserController');
/*Roles*/
Route::post('/panel/usuarios/roles', 'panel\UserController@role')->name('role.post');
Route::delete('/panel/usuarios/roles/{id}', 'panel\UserController@role_delete')->name('role.delete');
Route::put('/panel/usuarios/roles/actualizar/{id}', 'panel\UserController@role_update')->name('role.update');


/*Noticias*/
Route::resource('/panel/noticias', 'panel\NoticiaController');

/*Categorias*/
Route::post('/panel/noticias/categorias', 'panel\NoticiaController@categoria')->name('categoria.post');
Route::delete('/panel/noticias/categorias/{id}', 'panel\NoticiaController@categoria_delete')->name('categoria.delete');
Route::put('/panel/noticias/categorias/actualizar/{id}', 'panel\NoticiaController@categoria_update')->name('categoria.update');

/*Directorios*/
Route::resource('/panel/directorios', 'panel\DirectorioController');

/* Turismo */
Route::get('/panel/turismo', 'panel\SitioController@turismo')->name('turismo.inicio');
Route::resource('/panel/turismo/sitios', 'panel\SitioController');
Route::resource('/panel/turismo/eventos', 'panel\EventoController');

/************Página Pública ***********/
/*Inicio*/
Route::get('/', 'ppublic\InicioController@index')->name('index.inicio');


/*Directorio*/
Route::get('/directorio', 'ppublic\DirectorioController@index')->name('index.directorio');


/*Noticia*/
Route::get('/noticias', 'ppublic\NoticiaController@index')->name('index.noticia');
Route::get('/noticias/{url}', 'ppublic\NoticiaController@show')->name('show.noticia');

/* */

Auth::routes(["register" => false, "reset" => false, ]);

Route::get('/home', 'HomeController@index')->name('home');
