<label class="display-4">Listagem</label>
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
            <a class="btn btn-primary" href="{{ route('cliente.edit', $cliente->id) }}">Detalhes</a>
<<<<<<< HEAD
=======
            {{-- <form action="{{ route('cliente.delete', $cliente->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary">Excluir</button>
            </form> --}}
>>>>>>> c123f1eda9df5149cacd92c105d6470890d9eab8
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
