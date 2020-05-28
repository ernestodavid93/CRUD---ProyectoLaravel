<?php

use Illuminate\Support\Facades\Cache;

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
    return view('auth.login');
});



//Rutas con resource que direccionan al controlador especifico de cada una
Route::resource('/home','HomeController');
Route::resource('empleados','EmpleadosController')->middleware('auth'); //auth te impide entrar si no estas logeado
Route::resource('productos','ProductosController')->middleware('auth');
Route::resource('clientes','ClientesController')->middleware('auth');




Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home'); //Ruta que direcciona home al ingresar

