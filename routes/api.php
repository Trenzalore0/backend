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



// Rotas Cadastro 
Route::post(
  '/cliente/cadastro',
  'Api\CadastroController@createCadastro'
);

//Api categoria
Route::get(
  '/categoria/listarCategorias',
  'Api\ApiCategoriaController@listarCategoria'
);

//Api Cartao Credito
Route::get(
  '/cartaoCredito/listarCartao/{id}',
  'Api\ApiCartaoCredController@listarCartao'
);
Route::post(
  '/cartaoCredito/adicionarCartao',
  'Api\ApiCartaoCredController@adicionarCartao'
);
Route::get(
  '/cartaoCredito/buscarCartao/{id}',
  'Api\ApiCartaoCredController@buscarCartao'
);
Route::put(
  '/cartaoCredito/editarCartao/{id}',
  'Api\ApiCartaoCredController@editarCartao'
);
Route::delete(
  '/cartaoCredito/removerCartao/{id}',
  'Api\ApiCartaoCredController@removerCartao'
);

//Api Perfil
Route::get(
<<<<<<< HEAD
    '/itemPedido/listar',
    'Api\PedidoController@listAll'
=======
  '/perfil/buscarTipoPerfil/{id}',
  'Api\ApiPerfilController@buscarTipoPerfil'
>>>>>>> c9a04a6eb33516ee8f2bc396f485c8cc0ccdcba9
);

//Rotas Endereços
Route::get(
<<<<<<< HEAD
    '/itemPedido/pedido/{id}',
    'Api\PedidoController@selectProdutosPedido'
);

Route::post(
    '/itemPedido/criarLista/',
    'Api\PedidoController@createItem'
=======
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
>>>>>>> c9a04a6eb33516ee8f2bc396f485c8cc0ccdcba9
);

Route::get(
  '/produto/bucarCategoria/{id}',
  'Api\ProdutoController@buscarCategoria'
);

Route::get(
  'produto/index',
  'Api\ProdutoController@index'
);
