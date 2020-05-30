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

Route::get('/desktop',"AuditoriaController@index");
Route::get('/',"UsuarioController@index");
Route::get('/IniciarSesion',"UsuarioController@Login");
Route::get('/CerrarSesion',"UsuarioController@destroy");
Route::post('/CrearUsuario',"UsuarioController@create");
Route::post('/VerificaUsuario','UsuarioController@verify_user')->name('verify.user');


Route::get('/Email',function(){
    return view('welcome');
});