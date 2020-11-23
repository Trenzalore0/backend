@component('mail::message')

  <h1>Olá, {{ $user->nome }}!</h1>
  <p>Foi solicitado uma alteração de senha</p>

  @component('mail::button', ['url' => "http://localhost:3000/#/reset?token=$token&type=$type"])
    Criar uma nova Senha!
  @endcomponent

@endcomponent
  