<label class='display-4'>Criar <small>{{ $tipo }}</small></label>
<form action="{{ route($tipo.$rota, $dados->id ?? '') }}" method="post" class="form" enctype="multipart/form-data">
  @csrf
  @method('put')

  @if ($tipo == 'cliente')

    @include('form.includes.cliente')

  @elseif($tipo == 'produto')

    @include('form.includes.produto')

  @elseif($tipo == 'endereco')

    @include('form.includes.endereco')

  @elseif($tipo == 'uf')

    @include('form.includes.uf')

  @elseif($tipo == 'imagem')

    @include('form.includes.imagem')

  @else

    @include('form.includes.pedido')

  @endif

  <button type="submit" class="btn btn-success">Salvar</button>

</form>
