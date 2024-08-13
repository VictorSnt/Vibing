<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CustomResetPassword extends Notification
{
    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(config('app.url') . route('password.reset', ['token' => $this->token, 'email' => $this->email], false));

        return (new MailMessage)
            ->subject(Lang::get('Redefinição de Senha'))
            ->line(Lang::get('Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.'))
            ->action(Lang::get('Redefinir Senha'), $resetUrl)
            ->line(Lang::get('Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.'));
    }
}