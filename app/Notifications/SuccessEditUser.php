<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccessEditUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->subject('Saludos de parte de Clínica FisioEstética Glow!')
                    ->greeting('Hola ' . $notifiable->name)
                    ->line('Sus datos han sido modificados exitosamente por un administrador del sítio web.')
                    ->action('Visitar la página web', url('/'))
                    ->line('A continuación se muestran sus datos. Si hay algún error por favor comuniquece con nosotros.')
                    ->line('Nombre: '.$notifiable->name.' '.$notifiable->firstName.' '.$notifiable->lastName)
                    ->line('Fecha de nacimiento: '.$notifiable->birthday)
                    ->line('Nombre de usuario: '.$notifiable->username)
                    ->line('Correo electrónico: '.$notifiable->email)
                    ->line('Teléfono: '.$notifiable->phone)
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
