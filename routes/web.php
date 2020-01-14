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

/*******************************************************************
******************Perfiles*********************************************
*******************************************************************/

Route::get('perfil', 'PagesController@perfiles')->name('perfil');

/*******************************************************************
******************Areas*********************************************
*******************************************************************/

Route::get('area', 'PagesController@areas')->name('area');

Route::get('/area/crea', 'PagesController@creaArea')->name('area.crea');

Route::post('/area', 'PagesController@crearArea')->name('area.crear');

Route::get('/area/edita/{id?}', 'PagesController@editaArea')->name('area.edita');

Route::put('/area/{id}', 'PagesController@editarArea')->name('area.editar');

/******************************************************************
*******************Cargo*******************************************
******************************************************************/

Route::get('cargo', 'PagesController@cargos')->name('cargo');

Route::get('/cargo/crea', 'PagesController@creaCargo')->name('cargo.crea');

Route::post('/cargo', 'PagesController@crearCargo')->name('cargo.crear');

Route::get('/cargo/edita/{id?}', 'PagesController@editaCargo')->name('cargo.edita');

Route::put('/cargo/{id}', 'PagesController@editarCargo')->name('cargo.editar');

/*******************************************************************
******************Usuarios******************************************
*******************************************************************/

Route::get('usuario', 'PagesController@usuarios')->name('usuario');

Route::get('/usuario/crea', 'PagesController@creaUser')->name('usuario.crea');

Route::get('ajax',function() {
   return view('message');
});
Route::post('/usuario/select','PagesController@select');