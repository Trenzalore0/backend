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

//-----------ROTAS DE PRODUTO -----------------

Route::get('/produtos', 'ProdutoController@index')->name('produto.index');

Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('produto.adicionar');

Route::post('/produtos/salvar', 'ProdutoController@salvar')->name('produto.salvar');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->name('produto.editar');

Route::put('produtos/atualizar/{id}', 'ProdutoController@atualizar')->name('produto.atualizar');

Route::delete('/produtos/deletar/{id}', 'ProdutoController@deletar')
->name('produto.deletar');