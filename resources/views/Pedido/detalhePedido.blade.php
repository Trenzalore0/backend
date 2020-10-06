@extends('Pedido.layouts.site')
@section('titulo','Detalhe do Pedido')

@section('conteudo')
{{-- descrever o pedido por completo --}}

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <th class="scope">Numero Pedido</th>
                    <th class="scope">Tipo Pagamento</th>
                    <th class="scope">Comprador</th>
                    <th class="scope">Total da compra</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Numero</td>
                        <td>Cartão</td>
                        <td>Fulano</td>
                        <td>Total</td>
                    </tr>
                    <tr>
                        <td>Itens :</td>
                    </tr>
                    <tr>
                        <td>Nome do produto</td>
                        <td>Foto do produto</td>
                        <td>Quantidade comprada</td>
                        <td>Valor total</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection