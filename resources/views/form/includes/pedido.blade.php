<div class="form-group">
  <label for="nome">Nome cliente</label>
  <input type="text" class="form-control" id="nome" name="nome" value="{{ $dados->cd_cliente ?? '' }}" readonly>
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
  {{-- aqui fazer lista dos produtos no pedido --}}
</div>
{{-- <div class="form-group">
  <label for="quantidade">Quantidade</label>
  <input type="text" class="form-control" id="quantidade" name="quantidade" readonly>
</div> --}}
<div class="form-group">
  <label for="valor">Valor Total</label>
  <input type="text" class="form-control" id="valor" name="valor_total" value="R$ {{ $dados->valor_total ?? '' }}"
    readonly>
</div>

<div class="form-group">
  <label for="sel1">Tipo pagamento:</label>
  <input type="text" class='form-control' readonly value="{{  $dados->cd_status_pedido ?  $dados->cd_status_pedido == 1 ? 'boleto' : 'cartao' : '' }}">
</div>
