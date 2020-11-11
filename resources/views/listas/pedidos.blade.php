<label class="display-4">Listagem <small>Pedidos</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
</div>
  @if(!empty($mensagem))
    <div class="alert {{ $classe }} ">
      {{ $mensagem }}
    </div>
  @endif

<table class="table">
  <thead>
    <tr>
      <th class="scope" class='text-center'>Numero Pedido</th>
      <th class="scope" class='text-center'>Cd. Pagamento</th>
      <th class="scope" class='text-center'>Nome Cliente</th>
      <th class="scope" class='text-center'>Status</th>
      <th class="scope" class='text-center'>Ação</th>
    </tr>
  </thead>
  <tbody>
    {{-- colocar for each aqui --}}
    @foreach ($dados as $pedido)
      <tr>
        <td>{{ $pedido->id }}</td>
        <td>{{ $pedido->cd_pagamento }}</td>
        <td>{{ $pedido->cd_cliente }}</td>       
        <td>{{ $pedido->cd_status_pedido }}</td>          
        <td>          
          <div class='d-flex justify-content-around'>
            <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-outline-primary">Ver Pedido</a>
          </div>

        </td>
      </tr>
    @endforeach
    
  </tbody>
</table>

<div class="d-flex justify-content-center align-items-center">
  {{ $dados->links() }}
</div>

