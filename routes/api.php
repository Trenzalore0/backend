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


// ROTAS API - CLIENTE

Route::get('/listar', 
'API\ClienteController@listar');


Route::post('/salvar', 
'API\ClienteController@salvar');


Route::get('/buscar/{id}', 
'API\ClienteController@buscar');


Route::put('/atualizar/{id}', 
'Api\ClienteController@atualizar');

// ROTAS API - ITEM PEDIDO

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

// Rotas Cadastro 

Route::post('/cliente/cadastro', 'Api\CadastroController@createCadastro');

Route::get('/cliente/listar', 'Api\CadastroController@listAll');

Route::put('/cliente/atualizar/{id}', 'Api\CadastroController@atualizar');