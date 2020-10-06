@extends('Pedido.layouts.site')
@section('titulo','Pedidos')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2>Lista de Pedidos</h2>
            </div>
            <div class="col-2">
                <a href="" class="btn btn-success">Add. pedido manual</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
            </div>
        </div>    
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th class="scope">Numero Pedido</th>
                        <th class="scope">Cd. Pagamento</th>
                        <th class="scope">Nome Cliente</th>
                        <th class="scope">Quantidade de itens</th>
                        <th class="scope">Total da compra</th>
                        <th class="scope">Status</th>
                        <th class="scope">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- colocar for each aqui --}}
                    <tr>
                        <td>000001</td>
                        <td>01</td>
                        <td>Fulano</td>
                        <td>6</td>
                        <td>R$500.00</td>
                        <td>Aberto</td>
                        <td>
                        <div><a href="#" class="btn btn-primary">Ver Pedido</a></div>
                            <div><button class="btn btn-danger">Cancelar</button></div>
                        </td>
                    </tr>
                    {{-- fechar o each --}}
                </tbody>
            </table>
        </div>
</div>
    

@endsection