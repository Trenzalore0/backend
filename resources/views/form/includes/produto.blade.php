<div class="form-group">
  <label for="ds_produto"><b>Descrição Produto:</b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="ds_produto" name="ds_produto"
    value="{{ $dados->ds_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="nome_produto"><b>Nome do Produto: </b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="nome_produto" name="nome_produto"
    value="{{ $dados->nome_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="ano_produto"><b>Ano Produto</b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="ano_produto" name="ano_produto"
    value="{{ $dados->ano_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="valor_produto"><b>Valor do produto: </b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="valor_produto" name="valor_produto"
    value="{{ $dados->valor_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="desconto_produto"><b>Desconto do Produto: </b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="desconto_produto" name="desconto_produto"
    value="{{ $dados->valor_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="sel1">Pais origem do Produto:</label>
  <select class="form-control" id="sel1" name="cd_pais_origem">
    @foreach ($paises as $pais)
      <option value="{{ $pais->id }}">{{ $pais->ds_pais_origem }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="">Categoria: </label>
  <select class="form-control" name="cd_categoria" id="">
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->ds_categoria }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="">Imagem: </label>
  <input type="file" name="Imagem" id="">
</div>