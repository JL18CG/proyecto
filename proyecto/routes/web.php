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
Route::resource('/user','UserController');

/*Noticias*/
Route::resource('/panel/noticias', 'panel\NoticiaController');

/*Categorias*/
Route::post('/panel/noticias/categorias', 'panel\NoticiaController@categoria')->name('categoria.post');
Route::delete('/panel/noticias/categorias/{id}', 'panel\NoticiaController@categoria_delete')->name('categoria.delete');
Route::put('/panel/noticias/categorias/actualizar/{id}', 'panel\NoticiaController@categoria_update')->name('categoria.update');

/*Directorios*/
Route::resource('/panel/directorios', 'panel\DirectorioController');





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
