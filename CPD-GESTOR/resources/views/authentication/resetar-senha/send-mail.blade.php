@component('mail::message')
Olá,

Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.

@component('mail::button', ['url' => $url, 'color' => 'green']) 

RECUPERAR SENHA
@endcomponent

Se você não solicitou uma alteração da senha, nenhuma ação adicional é necessária.

Atenciosamente,<br>
equipe <b>SAGO</b>
@endcomponent
