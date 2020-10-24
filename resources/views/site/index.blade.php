@extends('layout.site')

@section('titulo', 'listagem')

@section('conteudo')



  @if($tipo == 'cliente')

    @include('listas.clientes')

  @elseif($tipo == 'produto')
  
    @include('listas.produto')

  @elseif($tipo == 'endereco')

    @include('listas.enderecos')  

  @elseif($tipo == 'uf')

    @include('listas.uf')

  @elseif($tipo == 'imagem')

    @include('listas.imagem')

  @else
  
    @include('listas.pedidos')

  @endif

@endsection