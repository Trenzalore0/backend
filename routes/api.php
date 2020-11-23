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



//Api Cadastro 
Route::post(
  '/cliente/cadastro',
  'Api\CadastroController@createCadastro'
);

Route::post(
  '/cliente/login',
  'Api\CadastroController@Login'
);

//Api categoria
Route::get(
  '/categoria/listarCategorias',
  'Api\ApiCategoriaController@listarCategoria'
);

//Api Cartao Credito
Route::get(
  '/cartao/listar/{id}',
  'Api\ApiCartaoCredController@listarCartao'
);

Route::post(
  '/cartao/adicionar',
  'Api\ApiCartaoCredController@adicionarCartao'
);

Route::get(
  '/cartao/buscarCartao/{id}',
  'Api\ApiCartaoCredController@buscarCartao'
);

Route::put(
  '/cartao/editarCartao/{id}',
  'Api\ApiCartaoCredController@editarCartao'
);
Route::delete(
  '/cartao/removerCartao/{id}',
  'Api\ApiCartaoCredController@removerCartao'
);

//Api Perfil
Route::get(
  '/perfil/buscarTipoPerfil/{id}',
  'Api\ApiPerfilController@buscarTipoPerfil'
);

//Rotas Endereços
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

Route::delete(
  '/endereco/deletar/{id}',
  'Api\EnderecoController@deletar'
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
  '/produto/index',
  'Api\ProdutoController@index'
);

// Routas de Pedido
Route::get(
  '/pedido/listar/{id}',
  'Api\PedidoController@listAll'
);

Route::post(
  '/pedido/criar',
  'Api\PedidoController@create'
);

// Rotas de consumo na page

Route::get(
  '/uf',
  'Api\ConsumoController@listUF'
);

Route::get(
  '/imagens/{tipo}',
  'Api\ConsumoController@GetImages'
);

Route::get(
  '/buscar/{pesquisa}',
  'Api\ConsumoController@buscar'
);

Route::post(
  '/sac',
  'Api\ConsumoController@SAC'
);

//  PASSWORD RESET

Route::post('/password', 'Api\PasswordController@sendMail');

Route::post('/alterPassword', 'Api\PasswordController@alterPassword');
