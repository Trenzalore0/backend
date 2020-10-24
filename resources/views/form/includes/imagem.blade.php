<div class="form-group col-6">
  <label for="nome" class='col-form-label-lg'>Imagem </label>
  <input type="file" id="nome" name="ds_imagem">
  @if(isset($dados))
    <img width='500' src="{{ url($dados->ds_imagem ?? '') }}">
  @endif
</div>
<div class="form-group col-6">
    <label for="ds" class='col-form-label-lg'>Tipo da Imagem </label>
    <input type="text" id='ds' name='tipo_imagem' value='{{ $dados->tipo_imagem ?? '' }}'>
</div>