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


//Rotas de cliente
Route::get('/clientes', 'ClienteController@index')->name('cliente');
Route::get('/clientes/adicionar', 'ClienteController@adicionar')->name('adicionar');
Route::post('/clientes/salvar', 'ClienteController@salvar')->name('salvar');
Route::get('/clientes/editar', 'ClienteController@editar')->name('editar');
Route::put('/clientes/atualizar', 'ClienteController@atualizar')->name('atualizar');
Route::delete('/clientes/deletar', 'ClienteController@deletar')->name('deletar');


//Rotas de produto
Route::get('/produtos', 'ProdutoController@index')->name('produto.index');
Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('produto.adicionar');
Route::post('/produtos/salvar', 'ProdutoController@salvar')->name('produto.salvar');
Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->name('produto.editar');
Route::put('produtos/atualizar/{id}', 'ProdutoController@atualizar')->name('produto.atualizar');
Route::delete('/produtos/deletar/{id}', 'ProdutoController@deletar')->name('produto.deletar');


// Rotas de pedido
Route::get('Pedido','PedidoController@index')->name('pedidos');
Route::get('Pedido/adicionar','PedidoController@adicionarPedido')->name('adicionar.pedido');
Route::get('Pedido/detalharPedido', 'PedidoController@detalharPedido')->name('detalhar.pedido');
Route::put('Pedido/atualizarPedido', 'PedidoController@atualizarPedido')->name('atualizar.pedido');
Route::put('Pedido/cancelarPedido', 'PedidoController@cancelarPedido')->name('cancelar.pedido');
Route::delete('Pedido/deletarPedido', 'PedidoController@deletarPedido')->name('deletar.pedido');
