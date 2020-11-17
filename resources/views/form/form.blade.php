<label class='display-4'>
    @if ($tipo != 'cliente')
        {{ $rota == '.store' ? 'Criar' : 'Alterar' }}
    @else
        {{ 'Visualizar' }}
    @endif
    <small>{{ $tipo }}</small>
</label>

<div class='float-right mt-3'>
    <a class='btn btn-outline-secondary' href="{{ route($tipo . '.index') }}">Listagem</a>
</div>
<form action="{{ route($tipo . $rota, $dados->id ?? '') }}" method="post" class="form" enctype="multipart/form-data">
    @csrf
    {{ isset($dados->id) ? method_field('put') : method_field('post') }}

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

    @if ($tipo != 'cliente')

        <button type="submit" class="btn btn-success mb-5">Salvar</button>

    @endif

</form>
