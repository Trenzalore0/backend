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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', 'ClienteController@index')->name('cliente');
Route::get('/clientes/adicionar', 'ClienteController@adicionar')->name('adicionar');
Route::post('/clientes/salvar', 'ClienteController@salvar')->name('salvar');
Route::get('/clientes/editar', 'ClienteController@editar')->name('editar');
Route::put('/clientes/atualizar', 'ClienteController@atualizar')->name('atualizar');
Route::delete('/clientes/deletar', 'ClienteController@deletar')->name('deletar');

