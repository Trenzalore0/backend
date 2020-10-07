@extends('Pedido.layouts.site')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
        <h3>Clientes Cadastrados</h3>
            </div>
            <div class="col-3">
            <a class="btn btn-success" href="{{ route('adicionar') }}">
                Adicionar</a>
            </div>
        </div>
        <div class="row">
            <div class="="col-12>
        @if(!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}
        </div>
        @endif
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">RG</th>
                        <th scope="col">CPF</th>
                        <th scope="col">data de nascimento</th>
                        <th scope="col">genero</th>
                        <th scope="col">login</th>
                        <th scope="col">senha</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->rg }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->dataDeNascimento }}</td>
                            <td>{{ $produto->publicado }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('editar', $cliente->id )}}">Editar</a>
                            <form action="{{ route('deletar' , $cliente->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Excluir</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>1</td>
                        <td>Costa</td>
                        <td>math@gmail.com</td>
                        <td>50.000.000-0</td>
                        <td>123.456.789-00</td>
                        <td>01/01/2000</td>
                        <td>Masculino</td>
                        <td>Example</td>
                        <td>*********</td>
                        <td>
                            <a class="btn btn-primary" href="#">Editar</a>
                        <form action="#" method="">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button type="submit" class="btn btn-secondary">Excluir</button>
                        </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection