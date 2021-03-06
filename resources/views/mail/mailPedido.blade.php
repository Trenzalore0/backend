@component('mail::message')

  <h1>Olá {{ $usuario->nome }}</h1>
  <p>Seu pedido foi efetuado com sucesso</p>
  <p>#{{ $pedido->id }}</p>
  <p>R$ {{ $pedido->valor_total }}</p>

  @component('mail::button', ['url' => 'http://localhost:3002/'])
    Visitar nosso site
  @endcomponent

  <p>{{ $usuario->nome }}, acesse nossas redes sociais também!</p>

  @component('mail::button', ['url' => 'https://www.instagram.com/pi_desvinhos/'])
    Acesse nossa
    página do instagram
  @endcomponent

@endcomponent
