<label class="display-4">Listagem</label>
<a href="{{ route('cliente.create') }}" class="btn btn-success float-right mt-3">Criar</a>
<table class="table">
  <thead> 
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">data de nascimento</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $cliente)
      <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->cpf }}</td>
        <td>{{ $cliente->dataDeNascimento }}</td>
        <td>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('editar', $cliente->id) }}">Editar</a>
            <form action="{{ route('deletar', $cliente->id) }}" method="POST">
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
