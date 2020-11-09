<div class="form-group col-6">
  <label for="nome" class='col-form-label-lg'>Imagem </label>
  <input type="file" id="nome" name="ds_imagem">
  @if(isset($dados))
    <img width='500' src="{{ url($dados->ds_imagem ?? '') }}">
  @endif
</div>