<label class="display-4">Listagem <small>Pedidos</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th class="scope" class='text-center'>Numero Pedido</th>
      <th class="scope" class='text-center'>Cd. Pagamento</th>
      <th class="scope" class='text-center'>Nome Cliente</th>
      <th class="scope" class='text-center'>Quantidade de itens</th>
      <th class="scope" class='text-center'>Total da compra</th>
      <th class="scope" class='text-center'>Status</th>
      <th class="scope" class='text-center'>Ação</th>
    </tr>
  </thead>
  <tbody>
    {{-- colocar for each aqui --}}
    @foreach ($dados as $pedido)
      <tr>
        <td>000001</td>
        <td>01</td>
        <td>Fulano</td>
        <td>qtd</td>
        <td></td>
        <td>Aberto</td>
        <td>
          <div class='d-flex justify-content-around'>
            <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-outline-primary">Ver Pedido</a>
          </div>

        </td>
      </tr>
    @endforeach
    {{-- fechar o each --}}
  </tbody>
</table>
