<div class="form-group">
    <label for="ds_produto"><b>Descrição Produto:</b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="ds_produto" name="ds_produto"
           value="{{$produto->ds_produto ?? ''}}">
</div>
<div class="form-group">
    <label for="nome_produto"><b>Nome do Produto: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="nome_produto" name="nome_produto"
           value="{{$produto->nome_produto ?? ''}}">
</div>

<div class="form-group">
    <label for="ano_produto"><b>Ano Produto</b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="ano_produto" name="ano_produto"
           value="{{$produto->ano_produto ?? ''}}">
</div>

<div class="form-group">
    <label for="valor_produto"><b>Valor do produto: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="valor_produto" name="valor_produto"
           value="{{$produto->valor_produto ?? ''}}">
</div>

<div class="form-group">
    <label for="desconto_produto"><b>Desconto do Produto: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="desconto_produto" name="desconto_produto"
           value="{{$produto->valor_produto ?? ''}}">
</div>

{{-- <div class="form-group">
    <label for="cd_pais_origem"><b>Pais origem produto: </b></label>
    <select name="" id=""></select>
    <input style="border-radius: 10px;" type="text" class="form-control" id="cd_pais_origem" name="cd_pais_origem"
           value="{{$produto->cd_pais_origem ?? ''}}">
</div> --}}

<div class="form-group">
    <label for="sel1">Pais origem do Produto:</label>
    <select class="form-control" id="sel1" name="cd_pais_origem">
        @foreach ($paises as $pais)
    <option value="{{$pais->id}}">{{$pais->cd_pais_origem}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="cd_categoria"><b>Categoria: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="cd_categoria" name="cd_categoria"
           value="{{$produto->cd_categoria ?? ''}}">
</div>