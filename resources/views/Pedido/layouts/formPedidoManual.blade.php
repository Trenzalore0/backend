<div class="form-group">
    <label for="nome">Nome cliente</label>
    <input type="text" class="form-control" id="nome" name="nome">
</div>
<div class="form-group">
    <label for="quantidade">Quantidade</label>
    <input type="text" class="form-control" id="quantidade" name="quantidade">
</div>
<div class="form-group">
    <label for="valor">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor">
</div>
<div class="form-group">
    <label for="sel1">Tipo pagamento:</label>
    <select class="form-control" id="sel1">
        {{-- fazer um each para os tipos de pagamento --}}
      <option>Cartão</option>
      <option>Boleto</option>
    </select>
  </div>
