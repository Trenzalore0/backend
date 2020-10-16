<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get(
    '/itemPedido/listar',
    'Api\ItemPedidoController@listAll'
);

Route::post(
    '/itemPedido/pedido',
    'Api\ItemPedidoController@selectProdutosPedido'
);

Route::post(
    '/itemPedido/criarLista',
    'Api\ItemPedidoController@createItem'
);



//Api route PEDIDO
Route::get('/pedido/listarPedidos','Api\ApiControllerPedido@listarPedidos'
);

Route::post('/pedido/adicionarPedido','Api\ApiControllerPedido@adicionarPedido'
);

Route::put('/pedido/atualizarPedido{id}','Api\ApiControllerPedido@atualizarPedido'
);


//Api categoria
Route::get('/categoria/listarCategorias','Api\ApiCategoriaController@listarCategoria');

//Api Cartao Credito
Route::get('/cartaoCredito/listarCartao/{id}','Api\ApiCartaoCredController@listarCartao');
Route::post('/cartaoCredito/adicionarCartao','Api\ApiCartaoCredController@adicionarCartao');
Route::get('/cartaoCredito/buscarCartao/{id}','Api\ApiCartaoCredController@buscarCartao');
Route::put('/cartaoCredito/editarCartao/{id}','Api\ApiCartaoCredController@editarCartao');
Route::delete('/cartaoCredito/removerCartao/{id}','Api\ApiCartaoCredController@removerCartao');