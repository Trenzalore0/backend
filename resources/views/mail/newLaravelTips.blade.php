@component('mail::message')
    
<h1>Bem vindo, {{$usuario->nome}}!</h1>
<p>Seu cadastro foi efetuado com sucesso!</p>

@component('mail::button',['url' => 'http://localhost:3002/'])
Visitar nosso site
@endcomponent

@component('mail::button',['url' => 'https://www.instagram.com/pi_desvinhos/'])
    Acesse nossa
página do instagram
@endcomponent


@endcomponent