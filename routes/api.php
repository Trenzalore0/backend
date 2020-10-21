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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get(
  '/pedido/listar',
  'Api\ItemPedidoController@listAll'
);

Route::get(
  '/pedido/pedido/{id}',
  'Api\ItemPedidoController@selectProdutosPedido'
);

Route::post(
  '/pedido/criarLista/',
  'Api\ItemPedidoController@create'
);

Route::get(
  '/cliente/listar',
  'API\ClienteController@listar'
);

Route::post(
  '/cliente/salvar',
  'API\ClienteController@salvar'
);

Route::get(
  '/cliente/buscar/{id}',
  'API\ClienteController@buscar'
);

Route::put(
  '/cliente/atualizar/{id}',
  'API\ClienteController@atualizar'
);
  