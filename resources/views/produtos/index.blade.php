@extends('produtos.layout.site')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class="container">
        <h1 style="text-align: center"><b><i>Lista de Produtos</b></i></h1>
        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif
        <div class="row">
            <a class="btn btn-success" href="{{ route('produto.adicionar') }}">Adicionar</a>
        </div>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descrição Produto</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Ano Produto</th>
                        <th scope="col">Valor Produto</th>
                        <th scope="col">Desconto Produto</th>
                        <th scope="col">Pais Origem</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->ds_produto }}</td>
                            <td>{{ $produto->nome_produto }}</td>
                            <td>{{ $produto->ano_produto }}</td>
                            <td>{{ $produto->valor_produto }}</td>
                            <td>{{ $produto->desconto_produto }}</td>
                            <td>{{ $produto->cd_pais_origem }}</td>
                            <td>{{ $produto->cd_categoria }}</td>
                            <td>
                                <img width="70" src="{{asset($produto->cd_imagem)}}">
                            </td>
                            <td>{{ $produto->valor_produto }}</td>
                            <td>
                                <form action="{{ route('produto.deletar', $produto->id) }}" method="POST">
                                <a class="btn btn-primary"
                                    href="{{ route('produto.editar', $produto->id) }}">Editar</a>
                                    
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection  