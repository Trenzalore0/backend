@component('mail::message')

  <h1>Olá o usuário {{ $user->name }} fez um comentário!</h1>
  <h1>Olá {{ $user->name }}</h1>

  <h3>Comentário: </h3>
  <p>{{ $user->message }}</p>


  @component('mail::button', ['url' => 'http://localhost:3002/'])
    Visitar nosso site
  @endcomponent

  <p>{{ $user->name }}, acesse nossas redes sociais também!</p>



@endcomponent
