@component('mail::message')

  <h1>Olá, {{ $user->nome }}!</h1>
  <p>Foi solicitado uma alteração de senha e foi alterada com sucesso!</p>


  @component('mail::button', ['url' => "http://localhost:3000/#/"])
    acessar nosso site
  @endcomponent

@endcomponent
  