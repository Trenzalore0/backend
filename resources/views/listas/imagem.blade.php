<label class="display-4">Listagem <small>Imagens</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
  <a href="{{ route('imagem.create') }}" class="btn btn-outline-success">Criar</a>
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
      <th scope="col" class='text-center'>Tipo Imagem</th>
      <th scope="col" class='text-center'>Imagem</th>
      <th scope="col" class='text-center'>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $imagem)
      <tr>
        <td class='text-center'>{{ $imagem->id }}</td>
        <td class='text-center'>{{ $imagem->tipo_imagem }}</td>
        <td class='text-center'><img width='100' src="{{ url($imagem->ds_imagem) }}"></td>
        <td class='text-center'>
          <div class="d-flex justify-content-around">
            <a class="btn btn-outline-primary" href="{{ route('imagem.edit', $imagem->id) }}">Editar</a>
            <form action="{{ route('imagem.delete', $imagem->id) }}" method="POST">
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
<div class="d-flex justify-content-center align-items-center">
  {{-- {{ $dados->links() }} --}}
</div>
