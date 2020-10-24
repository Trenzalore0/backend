<label class="display-4">Listagem <small>Uf</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
  <a href="{{ route('uf.create') }}" class="btn btn-outline-success">Criar</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class='text-center'>Id</th>
      <th scope="col" class='text-center'>Uf</th>
      <th scope="col" class='text-center'>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $uf)
      <tr>
        <td>{{ $uf->id }}</td>
        <td>{{ $uf->ds_uf }}</td>
        <td>
          <div class="d-flex justify-content-around">
            <a class="btn btn-outline-primary" href="{{ route('uf.edit', $uf->id) }}">Editar</a>
            <form action="{{ route('uf.delete', $uf->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">Excluir</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
