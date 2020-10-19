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
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $produto)
      <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->ds_produto }}</td>
        <td>{{ $produto->nome_produto }}</td>
        <td>{{ $produto->ano_produto }}</td>
        <td>{{ $produto->valor_produto }}</td>
        <td>{{ $produto->desconto_produto }}</td>
        <td>{{ $produto->cd_pais_origem }}</td>
        <td>{{ $produto->cd_categoria }}</td>
        <td>
          <img width="70" src="{{ asset($produto->cd_imagem) }}">
        </td>
        <td>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('produto.editar', $produto->id) }}">Editar</a>
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
