@component('mail::message')
    
<h1>Olá NOME</h1>
<p>O status do seu pedido mudou</p>
<p>Status: STATUS</p>


@component('mail::button',['url' => 'http://localhost:3002/'])
Visitar nosso site
@endcomponent

<p>{{$usuario->nome}}, acesse nossas redes sociais também!</p>

@component('mail::button',['url' => 'https://www.instagram.com/pi_desvinhos/'])
    Acesse nossa
página do instagram
@endcomponent


@endcomponent