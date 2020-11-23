<div class="form-group">
  <label for="nome">Nome cliente</label>
  <input type="text" class="form-control" id="nome" value="{{ $dados->cd_cliente ?? '' }}" readonly>
</div>
<div class="form-group">
  <label for="sel1">Produtos</label>
  <table class="table">
    <thead>
      <tr>
        <td>Produto</td>
        <td>Preço</td>
        <td>Quantidade</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($produtos as $produto)
        <tr>
          <td>{{ $produto->cd_produto }}</td>
          <td>R$ {{ $produto->valor_produto }}</td>
          <td>{{ $produto->quantidade_produto }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
  {{ $produtos->links() }}
  <div>

  </div>
</div>
<div class="form-group">
  <label for="valor">Valor Total</label>
  <input type="text" class="form-control" id="valor" value="R$ {{ $dados->valor_total ?? '' }}" readonly>
</div>

<div class="form-group">
  <label for="sel1">Tipo pagamento:</label>
  <input type="text" class='form-control' readonly
    value="{{ $dados->cd_tipo_pagamento ? ($dados->cd_tipo_pagamento == 1 ? 'boleto' : 'cartao') : '' }}">
</div>
<div class="from-group">
  <label for="sel1">Status do pedido:</label>
  <select class="form-control" name="cd_status_pedido" id="sel1">
    @foreach ($status as $states)
      <option {{ $dados->cd_status_pedido == $states->id ? 'selected' : '' }} value="{{ $states->id }}">
        {{ $states->ds_status }}
      </option>
    @endforeach
  </select>
</div>
<br>
