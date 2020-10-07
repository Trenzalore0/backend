@extends('Pedido.layouts.site')

@section('titulo', 'Adicionar Cliente')


@section('conteudo')
    <div class="container">
        <h3>Adiconar Cliente</h3>
        <div class="row">
            <form action="{{ route('salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('clientes.form')
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection()