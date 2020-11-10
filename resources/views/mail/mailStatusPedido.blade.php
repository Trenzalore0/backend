@component('mail::message')

  <h1>Olá {{ $usuario->nome }}</h1>
  <p>O seu pedido de número {{ $pedido->id }} mudou</p>
  <p>Status: {{ $status->ds_status }}</p>

  @component('mail::button', ['url' => 'http://localhost:3002/'])
    Visitar nosso site
  @endcomponent

  <p>{{ $usuario->nome }}, acesse nossas redes sociais também!</p>

  @component('mail::button', ['url' => 'https://www.instagram.com/pi_desvinhos/'])
    Acesse nossa
    página do instagram
  @endcomponent

@endcomponent
