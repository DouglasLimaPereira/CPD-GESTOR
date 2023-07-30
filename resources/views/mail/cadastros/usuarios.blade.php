@component('mail::message')
Olá, <b>{{$pessoa->nome}}</b>!

Bem-vindo ao <b>Sistema de Acompanhamento Gerencial de Obras - SAGO.</b>


Abaixo seguem os seus dados de acesso à plataforma.

Construtora: <b>{{$pessoa->company->razao_social}}</b>

Nome de usuário: <b>{{$usuario->email}}</b>

Senha: <b>{{$senha}}</b>    

@component('mail::button', ['url' => $url, 'color'=>'primary'])
ACESSAR O SISTEMA
@endcomponent

Caso tenha dificuldades em acessar pelo botão acima copie e cole o link abaixo.
{{$url}}

<b>ATENÇÃO:</b> Após realizar o seu primeiro acesso é de suma importância que atualize a sua senha.

Cordialmente,<br>
equipe <b>SAGO</b>

<small><em>Caso este email não tenha sido solicitado por você, exclua-o imediatamente e bloqueie o endereço de email do remetente.</em></small>

@endcomponent