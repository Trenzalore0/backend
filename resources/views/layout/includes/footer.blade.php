<style>
  footer {
    background-color: #660033;
    color: #ffffff;
  } 

  .Footer {
    padding: 10px;
    overflow: hidden;
  }
  
  p{
    text-align: center;
  }

  u{
    list-style-type: none;
     
  }

  .list_footer{
    display:inline;
    /* justify-content: space-around; */
  }

}
</style>     
        <footer>
        <div class="center Footer row">
          <div class='col-12 col-md-2 list_footer'>
            <ul>
              <a href="http://desvinho.herokuapp.com/public/produto"><li class='list_footer'>Produtos</li></a>
              <a href="http://desvinho.herokuapp.com/public/cliente"><li class='list_footer'>Clientes</li></a>
              <a href="http://desvinho.herokuapp.com/public/pedido"><li class='list_footer'>Pedidos</li></a>
              <a href="http://desvinho.herokuapp.com/public/imagem"><li class='list_footer'>Imagens</li></a>
            </ul>
          </div>  
        </div>
        <p class="cor center">Site exlusivo para administradores do Desvinho.</p>    
        <p class="cor copyright">Desvinho &copy; 2020</p>

    
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
      </footer>
  </body>
</html>