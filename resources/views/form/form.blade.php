<<<<<<< HEAD
<form action="{{ route($tipo.'.store') }}" method="post" class="form"
  enctype="multipart/form-data">
  @csrf
  @method('PUT')
=======
<form action="{{ route($tipo.'.store') }}" method="post" class="form">
  @csrf
  @method('put')
>>>>>>> 92446d4cd392f2ed3c5695880dfd6f34203c8e58
  @if ($tipo == 'cliente')

    @include('form.includes.cliente')

  @elseif($tipo == 'produto')

    @include('form.includes.produto')

  @elseif($tipo == 'endereco')

    @include('form.includes.endereco')  

  @else

    @include('form.includes.pedido')

  @endif
  <button type="submit" class="btn btn-success">Salvar</button>
</form>
