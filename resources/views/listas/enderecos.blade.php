<label class="display-4">Listagem <small>Endereços</small></label>
<div class='float-right mt-3'>
  <a class='btn btn-outline-secondary' href="{{ route('home.index') }}">Home</a>
</div>
<table class="table">
  <thead> 
    <tr>
      <th scope="col" class='text-center'>Id</th>
      <th scope="col" class='text-center'>Rua</th>
      <th scope="col" class='text-center'>Número</th>
      <th scope="col" class='text-center'>Bairro</th>
      <th scope="col" class='text-center'>Cep</th>
      <th scope="col" class='text-center'>UF</th>
      <th scope="col" class='text-center'>Referência</th>
      <th scope="col" class='text-center'>Complemento</th>
      {{-- <th scope="col">Cliente</th> --}}
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
        {{-- <td>{{ $endereco->cd_cliente }}</td> --}}
        <td>
          <div class="d-flex justify-content-around">
            <a class="btn btn-outline-primary" href="{{ route('endereco.edit', $endereco->id) }}">Editar</a>
            <form action="{{ route('endereco.deletar', $endereco->id) }}" method="POST">
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
