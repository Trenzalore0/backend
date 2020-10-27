<div class="form-group">
  <label for="nome">Nome cliente</label>
  <input type="text" class="form-control" id="nome" name="nome" readonly>
</div>
<div class="form-group">
  <label for="sel1">Produtos</label>
  <select class="form-control" id="sel1" readonly>

    @foreach ($produtos as $produto)
      <option>{{ $produto->nome_produto ?? ''}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="quantidade">Quantidade</label>
  <input type="text" class="form-control" id="quantidade" name="quantidade" readonly>
</div>
<div class="form-group">
  <label for="valor">Valor</label>
  <input type="text" class="form-control" id="valor" name="valor" readonly>
</div>
<div class="form-group">
  <label for="sel1">Tipo pagamento:</label>
  <select class="form-control" id="sel1" readonly>
    <option>Cartão</option>
    <option>Boleto</option>
  </select>
</div>
