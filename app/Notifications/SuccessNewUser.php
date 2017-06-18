<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccessNewUser extends Notification
{
    private $tempPassword;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newPass)
    {
        $this->tempPassword = $newPass;
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
                    ->subject('Bienvedido a la Clínica FisioEstética Glow!')
                    ->greeting('Hola ' . $notifiable->name)
                    ->line('Has sido agregado existosamente como un usuario del sítio web.')
                    ->action('Visitar la página web', url('/'))
                    ->line('Tú nombre de usuario es: '.$notifiable->username)
                    ->line('Tú contraseña temporal es: '.$this->tempPassword)
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
