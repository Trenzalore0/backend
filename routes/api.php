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
    '/itemPedido/listar',
    'Api\ItemPedidoController@listAll'
);

Route::get(
    '/itemPedido/pedido/{id}',
    'Api\ItemPedidoController@selectProdutosPedido'
);

Route::post(
    '/itemPedido/criarLista/',
    'Api\ItemPedidoController@createItem'
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

Route::get('/cliente/listar', 'API\ClienteController@listar');
Route::post('/cliente/salvar', 'API\ClienteController@salvar');
Route::get('/cliente/buscar/{id}', 'API\ClienteController@buscar');
Route::put('/cliente/atualizar/{id}', 'API\ClienteController@atualizar');

//Rota Tipo de Pagamento

Route::get(
    '/tipoPagamento/listar',
    'Api\TipoPagamentoController@listar'
);


//Rota Status de Pedido

Route::get(
    '/statusPedido/listar',
    'Api\StatusPedido@listar'
);
