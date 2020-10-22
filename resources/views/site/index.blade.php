@extends('layout.site')

@section('titulo', 'listagem')

@section('conteudo')



  @if($tipo == 'cliente')

    @include('listas.clientes')

  @elseif($tipo == 'produto')
    @include('listas.produto')

  @elseif($tipo == 'endereco')

    @include('listas.enderecos')  

  @else
  
    @include('listas.pedidos')

  @endif

@endsection