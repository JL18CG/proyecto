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
Route::resource('/panel/usuarios', 'panel\UserController')->except(['show']);
/*Roles*/
Route::post('/panel/usuarios/roles', 'panel\UserController@role')->name('role.post');
Route::delete('/panel/usuarios/roles/{id}', 'panel\UserController@role_delete')->name('role.delete');
Route::put('/panel/usuarios/roles/actualizar/{id}', 'panel\UserController@role_update')->name('role.update');


/*Noticias*/
Route::resource('/panel/noticias', 'panel\NoticiaController')->except(['show']);

/*Categorias*/
Route::post('/panel/noticias/categorias', 'panel\NoticiaController@categoria')->name('categoria.post');
Route::delete('/panel/noticias/categorias/{id}', 'panel\NoticiaController@categoria_delete')->name('categoria.delete');
Route::put('/panel/noticias/categorias/actualizar/{id}', 'panel\NoticiaController@categoria_update')->name('categoria.update');

/*Directorios*/
Route::resource('/panel/directorios', 'panel\DirectorioController')->except(['show']);

/* Turismo */
Route::get('/panel/turismo', 'panel\SitioController@turismo')->name('turismo.inicio');
Route::resource('/panel/turismo/sitios', 'panel\SitioController')->except(['index','show']);;
Route::resource('/panel/turismo/eventos', 'panel\EventoController')->except(['index','show']);;


/** Reportes  */
Route::resource('/panel/reportes', 'panel\ReporteController')->except(['show']);
Route::get('/panel/reportes/{archivo}', 'panel\ReporteController@pdfDowload')->name('pdf.dowload');












/************Página Pública ***********/
/*Inicio*/
Route::get('/', 'ppublic\InicioController@index')->name('index.inicio');


/*Directorio*/
Route::get('/directorio', 'ppublic\DirectorioController@index')->name('index.directorio');


/*Noticia*/
Route::get('/noticias', 'ppublic\NoticiaController@index')->name('index.noticia');
Route::get('/noticias/categorias/{url}', 'ppublic\NoticiaController@categoria_busqueda')->name('index.categoria_busqueda');



Route::get('/noticias/{url}', 'ppublic\NoticiaController@show')->name('show.noticia');

/* */

Auth::routes(["register" => false, "reset" => false, ]);

/*Route::get('/home', 'HomeController@index')->name('home');*/
