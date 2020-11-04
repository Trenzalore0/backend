<label class="display-4">Listagem <small>Produtos </small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
  <a href="{{ route('produto.create') }}" class="btn btn-outline-success ">Criar</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" class='text-center'>Id</th>
      <th scope="col" class='text-center'>Descrição Produto</th>
      <th scope="col" class='text-center'>Nome Produto</th>
      <th scope="col" class='text-center'>Ano Produto</th>
      <th scope="col" class='text-center'>Valor Produto</th>
      <th scope="col" class='text-center'>Desconto Produto</th>
      <th scope="col" class='text-center'>Pais Origem</th>
      <th scope="col" class='text-center'>Categoria</th>
      <th scope="col" class='text-center'>Imagem</th>
      <th scope="col" class='text-center'>ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $produto)
      <tr>
        <td class='text-center'>{{ $produto->id }}</td>
        <td class='text-center'>{{ $produto->ds_produto }}</td>
        <td class='text-center'>{{ $produto->nome_produto }}</td>
        <td class='text-center'>{{ $produto->ano_produto }}</td>
        <td class='text-center'>R$ {{ $produto->valor_produto }}</td>
        <td class='text-center'>R$ {{ $produto->desconto_produto }}</td>
        <td class='text-center'>{{ $produto->cd_pais_origem }}</td>
        <td class='text-center'>{{ $produto->cd_categoria }}</td>
        <td class='text-center'>
          <img width="70" height="60" class="w-100" src="{{ url($produto->ds_imagem) }}">
        </td>
        <td>
          <div class="d-flex justify-content-around">
            <a class="btn btn-outline-primary" href="{{ route('produto.edit', $produto->id) }}">Editar</a>
            <form action="{{ route('produto.deletar', $produto->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">Deletar</button>
            </form>
          </div>
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
{{ $dados->links() }}
</div>
