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

<<<<<<< HEAD
<<<<<<< HEAD
// Rotas Cadastro 

Route::post('/cliente/cadastro', 'Api\CadastroController@createCadastro');

Route::get('/cliente/listar', 'Api\CadastroController@listAll');

Route::put('/cliente/atualizar/{id}', 'Api\CadastroController@atualizar');
=======


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


//Api Perfil
Route::get('/perfil/buscarTipoPerfil/{id}','Api\ApiPerfilController@buscarTipoPerfil');
>>>>>>> 7494b9f18de1d93f323cb05cc20e0b9b5aea63d7
=======
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
>>>>>>> a474fda0b44d2f74574cde9bebf5f1a930bd4099
