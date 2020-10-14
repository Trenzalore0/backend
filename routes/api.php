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

Route::get(
    '/endereco/listar',
    'Api\EnderecoController@listar'
);

Route::post(
    '/endereco/salvar',
    'Api\EnderecoController@salvar'
);

Route::get(
    '/endereco/buscar/{id}',
    'Api\EnderecoController@buscar'
);

Route::put(
    '/endereco/atualizar/{id}',
    'Api\EnderecoController@atualizar'
);

Route::get('/listar', 'API\ClienteController@listar');
Route::post('/salvar', 'API\ClienteController@salvar');
Route::get('/buscar/{id}', 'API\ClienteController@buscar');
Route::put('/atualizar/{id}', 'Api\ClienteController@atualizar');

