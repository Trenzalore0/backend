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



Route::get('Pedido','PedidoController@index')->name('pedidos');
Route::get('Pedido/adicionar','PedidoController@adicionarPedido')->name('adicionar.pedido');
Route::get('Pedido/detalharPedido', 'PedidoController@detalharPedido')->name('detalhar.pedido');
Route::put('Pedido/atualizarPedido', 'PedidoController@atualizarPedido')->name('atualizar.pedido');
Route::put('Pedido/cancelarPedido', 'PedidoController@cancelarPedido')->name('cancelar.pedido');
Route::delete('Pedido/deletarPedido', 'PedidoController@deletarPedido')->name('deletar.pedido');
