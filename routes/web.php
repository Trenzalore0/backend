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

Route::get('/', 'Site\HomeController@index')
    ->name('home.index');


//Rotas de cliente
Route::get('/cliente', 'Site\ClienteController@index')
    ->name('cliente.index');

Route::get('/cliente/adicionar', 'Site\ClienteController@adicionar')
    ->name('cliente.create');

Route::post('/cliente/salvar', 'Site\ClienteController@salvar')
    ->name('cliente.store');

Route::get('/cliente/editar', 'Site\ClienteController@editar')
    ->name('cliente.edit');

Route::put('/cliente/atualizar', 'Site\ClienteController@atualizar')
    ->name('cliente.update');

Route::delete('/cliente/deletar', 'Site\ClienteController@deletar')
    ->name('cliente.delete');


//Rotas de produto
Route::get('/produto', 'Site\ProdutoController@index')
    ->name('produto.index');

Route::get('/produto/adicionar', 'Site\ProdutoController@adicionar')
    ->name('produto.create');

Route::post('/produto/salvar', 'Site\ProdutoController@salvar')
    ->name('produto.store');

Route::get('/produto/editar/{id}', 'Site\ProdutoController@editar')
    ->name('produto.edit');

Route::put('/produto/atualizar/{id}', 'Site\ProdutoController@atualizar')
    ->name('produto.update');

Route::delete('/produto/deletar/{id}', 'Site\ProdutoController@deletar')
    ->name('produto.deletar');


// Rotas de pedido
Route::get('/pedido', 'Site\PedidoController@index')
    ->name('pedido.index');

Route::get('/pedido/adicionar', 'Site\PedidoController@adicionar')
    ->name('pedido.create');

Route::post('/pedido/salvar', 'Site\PedidoController@salvar')
    ->name('pedido.store');

Route::get('/pedido/detalharPedido', 'Site\PedidoController@detalhar')
    ->name('pedido.edit');

Route::put('/pedido/atualizarPedido', 'Site\PedidoController@atualizar')
    ->name('pedido.update');

Route::put('/pedido/cancelarPedido', 'Site\PedidoController@cancelar')
    ->name('pedido.update.cancel');

Route::delete('/pedido/deletarPedido', 'Site\PedidoController@deletar')
    ->name('pedido.delete');
