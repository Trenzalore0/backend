<label class="display-4">Listagem</label>
<a href="{{ route('pedido.create') }}" class="btn btn-success float-right mt-3">Criar</a>
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
    @foreach ($dados as $pedido)
      <tr>
        <td>000001</td>
        <td>01</td>
        <td>Fulano</td>
        <td>qtd</td>
        <td></td>
        <td>Aberto</td>
        <td>
          <div><a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-primary">Ver Pedido</a></div>
          <form action="{{ route('pedido.update.cancel', $pedido->id) }}">
            @csrf 
            @method('put')
            <button class="btn btn-danger">Cancelar</button>
          </form>
        </td>
      </tr>
    @endforeach
    {{-- fechar o each --}}
  </tbody>
</table>
