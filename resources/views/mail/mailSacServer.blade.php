@component('mail::message')

  <h1>Olá o usuário {{ $user->name }} fez um comentário!</h1>

  <h3>E-mail para contato:</h3>
  <p>{{ $user->email }}</p>

  <h3>Assunto: </h3>
  <p>{{ $user->subject }}</p>


  <h3>Comentário: </h3>
  <p>{{ $user->message }}</p>


@endcomponent
