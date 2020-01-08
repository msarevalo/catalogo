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

Route::get('perfil', 'PagesController@perfiles')->name('perfil');

/*******************************************************************
******************Areas*********************************************
*******************************************************************/


Route::get('area', 'PagesController@areas')->name('area');

Route::get('/area/crea', 'PagesController@creaArea')->name('area.crea');

Route::post('/area', 'PagesController@crearArea')->name('area.crear');

Route::get('/area/edita/{id?}', 'PagesController@editaArea')->name('area.edita');

Route::get('cargo', 'PagesController@cargos')->name('cargo');