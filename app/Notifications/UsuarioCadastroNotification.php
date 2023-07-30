<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsuarioCadastroNotification extends Notification
{
    use Queueable;

    private $pessoa, $usuario, $senha;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pessoa, $usuario, $senha)
    {
        $this->pessoa = $pessoa;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("SAGO - Cadastro de usuário")
            ->from('noreply@sago.com.br', 'SAGO - GERENCIADOR DE OBRAS')
            ->markdown('mail.cadastros.usuarios', [
                'pessoa' => $this->pessoa,
                'usuario' => $this->usuario,
                'senha' => $this->senha,
                'url' => env('APP_URL_CLIENTE')
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
