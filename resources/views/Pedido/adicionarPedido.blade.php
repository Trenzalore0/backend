@extends('Pedido.layouts.site')

@section('titulo','Adicionar Pedido')

@section('conteudo')
<div class="container">
    <h3>Adicionar Pedido</h3>
    <div class="row">
        <form action="#" method="">
            @csrf
            @include('Pedido.layouts.formPedidoManual')
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
    
@endsection