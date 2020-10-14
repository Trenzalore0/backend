<div class="form-group">
    <label for="rua"><b>Rua:</b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="rua" name="rua"
      value="{{ $dados->rua ?? '' }}">
  </div>
  <div class="form-group">
    <label for="numero"><b>Número: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="numero" name="numero"
      value="{{ $dados->numero ?? '' }}">
  </div>
  
  <div class="form-group">
    <label for="bairro"><b>Bairro</b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="bairro" name="bairro"
      value="{{ $dados->bairro ?? '' }}">
  </div>
  
  <div class="form-group">
    <label for="cep"><b>Cep: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="cep" name="cep"
      value="{{ $dados->cep ?? '' }}">
  </div>
  
  {{-- <div class="form-group">
    <label for="cd_uf"><b>UF: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="cd_uf" name="cd_uf"
      value="{{ $dados->cd_uf ?? '' }}">
  </div> --}}

  <div class="form-group">
    <label for="referencia"><b>Referência: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="referencia" name="referencia"
      value="{{ $dados->referencia ?? '' }}">
  </div>

  <div class="form-group">
    <label for="complemento"><b>Complemento: </b></label>
    <input style="border-radius: 10px;" type="text" class="form-control" id="complemento" name="complemento"
      value="{{ $dados->complemento ?? '' }}">
  </div>
  