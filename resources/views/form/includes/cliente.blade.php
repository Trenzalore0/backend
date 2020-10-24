<div class="form-group col-6">
  <label for="nome">Nome</label>
  <input type="text" class="form-control" id="nome" name="nome"
    value="{{ $dados->nome ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="email">Email</label>
  <input type="text" class="form-control" id="email" name="email"
    value="{{ $dados->email ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="rg">RG</label>
  <input type="text" class="form-control" id="rg" name="rg"
    value="{{ $dados->rg ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="cpf">CPF</label>
  <input type="text" class="form-control" id="cpf" name="cpf"
    value="{{ $dados->cpf ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="data_de_nascimento">Data de Nascimento</label>
  <input type="date" class="form-control" id="data_de_nascimento" name="data_de_nascimento"
    value="{{ $dados->data_de_nascimento ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="genero">Genero</label>
  <input type="text" class="form-control" id="genero" name="genero"
    value="{{ $dados->genero ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="login">Login</label>
  <input type="text" class="form-control" id="login" name="login"
    value="{{ $dados->login ?? '' }}" readonly>
</div>
<div class="form-group col-6">
  <label for="senha">Senha</label>
  <input type="password" class="form-control" id="senha" name="senha" readonly>
</div>
