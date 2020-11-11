<label class="display-4">Listagem <small>Clientes</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
</div>
@if (!empty($mensagem))
  <div class="alert {{ $classe }} ">
    {{ $mensagem }}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col" class='text-center'>Id</th>
      <th scope="col" class='text-center'>Nome</th>
      <th scope="col" class='text-center'>Email</th>
      <th scope="col" class='text-center'>CPF</th>
      <th scope="col" class='text-center'>data de nascimento</th>
      <th scope="col" class='text-center'>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $cliente)
      <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->cpf }}</td>
        <td>{{ $cliente->data_de_nascimento }}</td>
        <td>
          <div class="d-flex justify-content-around">
            <a class="btn btn-outline-primary" href="{{ route('cliente.edit', $cliente->id) }}">Detalhes</a>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center align-items-center">
  {{ $dados->links() }}
</div>
