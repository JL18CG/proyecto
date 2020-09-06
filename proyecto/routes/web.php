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
Route::resource('/panel/turismo/sitios', 'panel\SitioController');
Route::resource('/panel/turismo', 'panel\TurismoController');

/*
Route::get('/', function () {
  
    App::setLocale('es');
    $locale = App::getLocale();
    echo $locale;

});
*/


Route::get('/login', function () {
    return view('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
