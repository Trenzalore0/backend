<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Desvinho Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li> 
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pedido.index') }}">Pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('produto.index') }}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('endereco.index') }}">Endereco</a>
        </li>
      @endguest
    </ul>
  </div>

</nav>
