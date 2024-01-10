@component('mail::message')
Olá, <b>{{$pessoa->nome}}</b>!

Bem-vindo ao <b>Sistema de Acompanhamento Gerencial de Obras - SAGO.</b>

Você foi cadastrado como usuário na construtora <b>{{$pessoa->company->razao_social}}</b>

Utilize o botão abaixo para realizar o acesso ao sistema.

@component('mail::button', ['url' => $url, 'color'=>'primary'])
    ACESSAR O SISTEMA
@endcomponent

Caso tenha dificuldades em acessar o sistema pelo botão acima copie e cole o link abaixo em seu navegador preferido.
{{$url}}

Cordialmente,<br>
equipe <b>SAGO</b>

<small><em>Caso este email não tenha sido solicitado por você, exclua-o imediatamente e bloqueie o endereço de email do remetente.</em></small>

@endcomponent