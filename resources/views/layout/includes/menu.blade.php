<style>
  .navbar-brand, nav {
    background-color: #660033;
  }
</style> 
<nav class="navbar navbar-expand-md navbar-dark">
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
<<<<<<< HEAD
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="nav-link text-secondary" type="submit" value="Logout"/>
          </form>
          
=======
          <a class="nav-link" href="{{ route('endereco.index') }}">Endereco</a>
>>>>>>> c9a04a6eb33516ee8f2bc396f485c8cc0ccdcba9
        </li>
      @endguest
    </ul>
  </div>
</nav>
