@component('mail::message')
    
<h1>Olá NOME</h1>
<p>Seu pedido foi efetuado com sucesso</p>
<p>NUMEROPEDIDO</p>
<p>VALORPEDIDO</p>



@component('mail::button',['url' => 'http://localhost:3002/'])
Visitar nosso site
@endcomponent

<p>{{$usuario->nome}}, acesse nossas redes sociais também!</p>


@endcomponent