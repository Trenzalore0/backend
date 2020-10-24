<label class="display-4">Listagem <small>Imagens</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Voltar</a>
  <a href="{{ route('imagem.create') }}" class="btn btn-outline-success">Criar</a>
</div>
<table class="table">
  <thead> 
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Imagem</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $imagem)
      <tr>
        <td>{{ $imagem->id }}</td>
        <td><img width='100' src="{{ url($imagem->ds_imagem) }}"></td>
        <td>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('imagem.edit', $imagem->id) }}">Detalhes</a>
            <form action="{{ route('uf.delete', $imagem->id) }}" method="POST">
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
