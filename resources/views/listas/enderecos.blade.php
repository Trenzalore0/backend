<label class="display-4">Listagem</label>
<a href="{{ route('endereco.create') }}" class="btn btn-success float-right mt-3">Criar</a>
<table class="table">
  <thead> 
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Rua</th>
      <th scope="col">Número</th>
      <th scope="col">Bairro</th>
      <th scope="col">Cep</th>
      <th scope="col">UF</th>
      <th scope="col">Referência</th>
      <th scope="col">Complemento</th>
      <th scope="col">Cliente</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $endereco)
      <tr>
        <td>{{ $endereco->id }}</td>
        <td>{{ $endereco->rua }}</td>
        <td>{{ $endereco->numero }}</td>
        <td>{{ $endereco->bairro }}</td>
        <td>{{ $endereco->cep }}</td>
        <td>{{ $endereco->cd_uf }}</td>
        <td>{{ $endereco->referencia }}</td>
        <td>{{ $endereco->complemento }}</td>
        <td>{{ $endereco->cd_cliente }}</td>
        <td>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('editar', $endereco->id) }}">Editar</a>
            <form action="{{ route('deletar', $endereco->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary">Excluir</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
