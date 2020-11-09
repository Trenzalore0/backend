<label class="display-4">Listagem <small>Uf</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Voltar</a>
  <a href="{{ route('uf.create') }}" class="btn btn-outline-success">Criar</a>
</div>
<table class="table">
  <thead> 
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Uf</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $uf)
      <tr>
        <td>{{ $uf->id }}</td>
        <td>{{ $uf->ds_uf }}</td>
        <td>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('uf.edit', $uf->id) }}">Detalhes</a>
            <form action="{{ route('uf.delete', $uf->id) }}" method="POST">
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
