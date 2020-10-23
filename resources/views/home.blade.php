@extends('layout.site')

@section('titulo', 'Home')


@section('conteudo')

  <label class='display-4'>Home <small>Page</small></label>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4 mt-4">

        <div class="card">
          <div class="card-body">

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
                <h4>Escolha á operação:</h4>
              </div>
              <div class="card-text">
                <div class="d-flex justify-content-around">
                  <a class="btn btn-outline-primary" href="{{ route('produto.index') }}">Produtos</a>
                  <a class="btn btn-outline-primary" href="{{ route('cliente.index') }}">Clientes</a>
                  <a class="btn btn-outline-primary" href="{{ route('pedido.index') }}">Pedidos</a>
                </div>
              </div>
            @endguest

          </div>
        </div>

      </div>

    </div>
  </div>


@endsection
