@extends('Pedido.layouts.site')

@section('titulo', 'Editar Cliente')


@section('conteudo')
    <div class="container">
        <h3>Editar Dados</h3>
        <div class="row">
            <form action="{{ route('atualizar', $cliente->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('produtos.form')
                <button type="submit" class="btn btn-success">Salvar Dados</button>
            </form>
        </div>
    </div>
@endsection()