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

//Rotas Endereços
Route::get(
    '/endereco/adicionar',
    'Api\EnderecoController@adicionar'
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

//Rotas Produtos
Route::get(
    '/produto/listar',
    'Api\ProdutoController@listar'
);

Route::get(
    '/produto/buscar/{id}',
    'Api\ProdutoController@buscar'
);

Route::get(
    '/produto/bucarCategoria/{id}',
    'Api\ProdutoController@buscarCategoria'
);

Route::get(
    'produto/index',
    'Api\ProdutoController@index'
);

Route::get('/cliente/listar', 'API\ClienteController@listar');
Route::post('/cliente/salvar', 'API\ClienteController@salvar');
Route::get('/cliente/buscar/{id}', 'API\ClienteController@buscar');
Route::put('/cliente/atualizar/{id}', 'API\ClienteController@atualizar');


// Rotas Cadastro 

Route::post('/cliente/cadastro', 'Api\CadastroController@createCadastro');
