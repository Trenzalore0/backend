
@extends('produtos.layout.site')

@section ('titulo', 'Adicionar Produto')

@section('conteudo')

<div class="container">
    <h1 style="text-align: center"><b><i>Adcionar Produtos</i></b></h1>
    <div class="row">
    <form action="{{ route('produto.salvar') }}" method="post" enctype="multipart/form-data" >
        @csrf       
       
        @include('produtos.form')
    
        <br>
        <button type="submit" class="btn btn-success"> Salvar </button>
    </form>
    </div>
</div>
@endsection()