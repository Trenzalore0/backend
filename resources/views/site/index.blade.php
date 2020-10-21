@extends('layout.site')

@section('titulo', 'listagem')

@section('conteudo')



  @if($tipo == 'cliente')

    @include('listas.clientes')

  @elseif($tipo == 'produto')
    @include('listas.produto')

  @else
  
    @include('listas.pedidos')

  @endif

@endsection