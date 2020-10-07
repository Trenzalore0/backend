@if ($tipo == 'cliente')

  @include('form.includes.cliente')

@elseif($tipo == 'produto')

  @include('form.includes.produto')

@else

  @include('form.includes.pedido')

@endif
