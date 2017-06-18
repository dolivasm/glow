<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccessActivateUser extends Notification
{
    use Queueable;
    private $psswrd;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tempPass)
    {
        $this->psswrd = $tempPass;
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
                    ->subject('Saludos de parte de la Clínica FisioEstética Glow!')
                    ->greeting('Hola ' . $notifiable->name)
                    ->line('Su cuenta ha sido re-activada exitosamente.')
                    ->action('Visitar la página web', url('/'))
                    ->line('Su nombre de usuario es el mismo, pero se le asignó una contraseña temporal:')
                    ->line('Nombre de usuario es: '.$notifiable->username)
                    ->line('Contraseña temporal es: '.$this->psswrd)
                    ->line('Gracias por su preferencia!');
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
