<form action="{{ route($tipo.'.store') }}" method="post" class="form">
  @csrf
  @method('put')
  @if ($tipo == 'cliente')

    @include('form.includes.cliente')

  @elseif($tipo == 'produto')

    @include('form.includes.produto')

  @else

    @include('form.includes.pedido')

  @endif
  <button type="submit" class="btn btn-success">Salvar</button>
</form>
