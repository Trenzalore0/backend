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
    value="{{$dados->valor_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="desconto_produto"><b>Desconto do Produto: </b></label>
  <input style="border-radius: 10px;" type="text" class="form-control" id="desconto_produto" name="desconto_produto"
    value="{{ $dados->desconto_produto ?? '' }}">
</div>

<div class="form-group">
  <label for="sel1">Pais origem do Produto:</label>

  <div class="container">
    <div class="row">
      <div class="col-6">
        <select style="border-radius: 10px;" class="form-control" id="sel1" name="cd_pais_origem" value="{{ $dados->cd_pais_origem ?? '' }}">
          <option value="">selecione</option>
          @foreach ($paises as $pais)
            <option
            {{ $dados ?? '' != '' ? $dados->cd_pais_origem == $pais->id ? 'selected' : '' : '' }}
            {{-- @if($dados ?? ''->cd_pais_origem == $pais->id)
              selected
            @endif --}}
            value="{{ $pais->id }}">{{ $pais->ds_pais_origem }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-6">
        <input style="border-radius: 10px;" type="text" name='ds_pais_origem' class='form-control' placeholder='configure um novo Pais'>
      </div>
    </div>
  </div>

</div>

<div class="form-group">
  <label for="">Status do produto:</label>
  <select name="status_produto" class='form-control col-2'>
    <option value="ativado">ativar</option>
    <option value="desativado">desativar</option>
  </select>
</div>

<div class="form-group">
  <label for="">Categoria: </label>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <select style="border-radius: 10px;" class="form-control" name="cd_categoria">
          <option value="">selecione</option>
          @foreach ($categorias as $categoria)
            <option 
              @if($dados ?? '' != '' ? $categoria->id == $dados->cd_categoria : '')
                selected
              @endif
              value="{{ $categoria->id }}">{{ $categoria->ds_categoria }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-6">
        <input style="border-radius: 10px;" type="text" name='ds_categoria' placeholder='crie uma nova categoria' class='form-control'>
      </div>
    </div>
  </div>

</div>

<div class="form-group">
  <label for="ds_imagem">Imagem: </label>
  <input type="file" name="ds_imagem" id="ds_imagem">
</div>

<div>
  <img class='w-50 mb-2' src="{{ url($dados->ds_imagem ?? '') }}" alt="">
</div>
