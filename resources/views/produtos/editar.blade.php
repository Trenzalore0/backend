@extends('produtos.layout.site')

@section('titulo', 'Editar Produto')


@section('conteudo')
    <div class="container">
        <h1 style="text-align: center"><i><b>Editar Produto</b></i></h1>
        <div class="row">
            <form action="{{ route('produto.atualizar', $produto->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('produtos.formulario')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()