@include('layout.includes.head')

@include('layout.includes.menu')

<div class="container">
  <div class="row">
    <div class="col-12">

      @yield('conteudo')
      
    </div>
  </div>
</div>

@include('layout.includes.footer')