<?php

use App\Mail\mailSac;
use App\Mail\newLaravelTips;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', 'Site\HomeController@index')
    ->name('home.index');

Route::group(['middleware' => 'auth'], function () {

    //Rotas de cliente
    Route::get(
        '/cliente',
        'Site\ClienteController@index'
    )->name('cliente.index');

    Route::get(
        '/cliente/adicionar',
        'Site\ClienteController@adicionar'
    )->name('cliente.create');

    Route::post(
        '/cliente/salvar',
        'Site\ClienteController@salvar'
    )->name('cliente.store');

    Route::get(
        '/cliente/editar',
        'Site\ClienteController@editar'
    )->name('cliente.edit');

    Route::put(
        '/cliente/atualizar',
        'Site\ClienteController@atualizar'
    )->name('cliente.update');

    Route::delete(
        '/cliente/deletar',
        'Site\ClienteController@deletar'
    )->name('cliente.delete');

    //Rotas de produto
    Route::get(
        '/produto',
        'Site\ProdutoController@index'
    )->name('produto.index');

    Route::get(
        '/produto/adicionar',
        'Site\ProdutoController@adicionar'
    )->name('produto.create');

    Route::put(
        '/produto/salvar',
        'Site\ProdutoController@salvar'
    )->name('produto.store');

    Route::get(
        '/produto/editar/{id}',
        'Site\ProdutoController@editar'
    )->name('produto.edit');

    Route::put(
        '/produto/atualizar/{id}',
        'Site\ProdutoController@atualizar'
    )->name('produto.update');

    Route::delete(
        '/produto/deletar/{id}',
        'Site\ProdutoController@deletar'
    )->name('produto.deletar');

    // Rotas de pedido
    Route::get(
        '/pedido',
        'Site\PedidoController@index'
    )->name('pedido.index');

    Route::get(
        '/pedido/adicionar',
        'Site\PedidoController@adicionar'
    )->name('pedido.create');

    Route::post(
        '/pedido/salvar',
        'Site\PedidoController@salvar'
    )->name('pedido.store');

    Route::get(
        '/pedido/detalharPedido',
        'Site\PedidoController@detalhar'
    )->name('pedido.edit');

    Route::put(
        '/pedido/atualizarPedido',
        'Site\PedidoController@atualizar'
    )->name('pedido.update');

    Route::put(
        '/pedido/cancelarPedido',
        'Site\PedidoController@cancelar'
    )->name('pedido.update.cancel');

    Route::delete(
        '/pedido/deletarPedido',
        'Site\PedidoController@deletar'
    )->name('pedido.delete');
    
    //Rotas Endereço
    Route::get(
        '/endereco',
        'Site\EnderecoController@index'
    )->name('endereco.index');
    
    Route::get(
        '/endereco/adicionar',
        'Site\EnderecoController@adicionar'
    )->name('endereco.create');
    
    Route::put(
        '/endereco/salvar',
        'Site\EnderecoController@salvar'
    )->name('endereco.store');
    
    Route::get(
        '/endereco/editar/{id}',
        'Site\EnderecoController@editar'
    )->name('endereco.edit');
    
    Route::put(
        '/endereco/atualizar/{id}',
        'Site\EnderecoController@atualizar'
    )->name('endereco.update');
    
    Route::delete(
        '/endereco/deletar/{id}',
        'Site\EnderecoController@deletar'
    )->name('endereco.deletar');
});

Route::get('email-cadastro', function(){
    $usuario = new stdClass();
    $usuario->nome = 'Admin';
    $usuario->email = 'desvinho@gmail.com';
    // return new newLaravelTips($usuario);
    // return new mailSac($usuario);
    Mail::send(new newLaravelTips($usuario));
});

Auth::routes();
