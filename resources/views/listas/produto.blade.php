<label class="display-4">Listagem</label>
<a href="{{ route('produto.create') }}" class="btn btn-success float-right mt-3">Criar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Descrição Produto</th>
      <th scope="col">Nome Produto</th>
      <th scope="col">Ano Produto</th>
      <th scope="col">Valor Produto</th>
      <th scope="col">Desconto Produto</th>
      <th scope="col">Pais Origem</th>
      <th scope="col">Categoria</th>
      <th scope="col">Imagem</th>
      <th scope="col">ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $produto)
      <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->ds_produto }}</td>
        <td>{{ $produto->nome_produto }}</td>
        <td>{{ $produto->ano_produto }}</td>
        <td>R$ {{ $produto->valor_produto }}</td>
        <td>{{ $produto->desconto_produto }}</td>
        <td>{{ $produto->cd_pais_origem }}</td>
        <td>{{ $produto->cd_categoria }}</td>
        <td>
          <img width="70" height="60" class="w-100" src="{{ $produto->cd_imagem }}">
        </td>
        <td>
          <div class="d-flex justify-content-between">
          <div class="d-flex">
          <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('produto.edit', $produto->id) }}">Editar</a>
            <form action="{{ route('produto.deletar', $produto->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
          </div>
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
