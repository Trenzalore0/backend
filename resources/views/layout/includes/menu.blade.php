<style>
  .navbar-brand, nav {
    background-color: #660033;
  }
</style> 
<nav class="navbar navbar-expand-md navbar-dark p-3">
  <a class="navbar-brand" href="#">Desvinho Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @guest
      @else
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="nav-link btn" type="submit" value="Logout"/>
          </form>
        </li>
      @endguest
    </ul>
  </div>
</nav>
