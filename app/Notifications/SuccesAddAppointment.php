<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccesAddAppointment extends Notification
{
    use Queueable;
    private $tempTime;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($time)
    {
        $this->tempTime=$time;
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
                    ->subject('Reservación Exitosa!')
                    ->greeting('Hola ' . $notifiable->name.'!')
                    ->line('Tu reservación ha sido registrada exitosamente.')
                    ->line('Fecha y Hora: '.$this->tempTime)
                    ->action('Podrías comprobarlo en:', url('/appointment'))
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
