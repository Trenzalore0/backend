@extends('layout.site')

@section('titulo', 'Home')


@section('conteudo')

  <label class='display-4'>Home <small>Page</small></label>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-4">
        @guest
          <div class="card-title mb-4">
            <h4>Realize o login ou cadastre-se</h4>
          </div>
          <div class="card-text">
            <div class="d-flex justify-content-around">
              <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
              <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
            </div>
          </div>
        @else
          <div class="card-title mb-4">
            <h4>Escolha a operação:</h4>
          </div>

          <div class="d-flex justify-content-around">
            <div class="col-12">
              <div class="container">
                <div class="row d-flex justify-content-around">
                  <a class="col-12 col-sm-4 col-md-2 btn btn-outline-primary"
                    href="{{ route('produto.index') }}">Produtos</a>
                  <a class="col-12 col-sm-4 col-md-2 btn btn-outline-primary"
                    href="{{ route('cliente.index') }}">Clientes</a>
                  <a class="col-12 col-sm-4 col-md-2 btn btn-outline-primary" href="{{ route('pedido.index') }}">Pedidos</a>
                  <a class="col-12 col-sm-4 col-md-2 btn btn-outline-primary" href="{{ route('uf.index') }}">Uf</a>
                  <a class="col-12 col-sm-4 col-md-2 btn btn-outline-primary" href="{{ route('imagem.index') }}">Imagem</a>
                </div>
              </div>

            </div>
          </div>

        @endguest

      </div>

    </div>
  </div>


@endsection
