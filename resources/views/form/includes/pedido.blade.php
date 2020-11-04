<div class="form-group">
  <label for="nome">Nome cliente</label>
  <input type="text" class="form-control" id="nome" name="nome" readonly>
</div>
<div class="form-group">
  <label for="sel1">Produtos</label>
  <table class="table">
    <thead>
      <tr>
        <td>Produto</td>
        <td>Preço</td>
        <td>quantidade</td>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  <div >

  </div>
  {{-- aqui fazer lista dos produtos no pedido --}}
</div>
{{-- <div class="form-group">
  <label for="quantidade">Quantidade</label>
  <input type="text" class="form-control" id="quantidade" name="quantidade" readonly>
</div> --}} 
<div class="form-group">
  <label for="valor">Valor Total</label>
  <input type="text" class="form-control" id="valor" name="valor" readonly>
</div>
<div class="form-group">
  <label for="sel1">Tipo pagamento:</label>
  <select class="form-control" id="sel1" readonly>
    <option>Cartão</option>
    <option>Boleto</option>
  </select>
</div>
