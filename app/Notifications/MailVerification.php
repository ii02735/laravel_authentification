<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
class MailVerification extends Notification
{
    use Queueable;
    public $utilisateur;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $utilisateur)
    {
        //
        $this->utilisateur = $utilisateur;
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
            ->line('Veuillez vérifier le mail de confirmation avec de continuer...')
            ->action('Vérifier le compte', route('verifier',$this->utilisateur->token))
            ->line('Après vérification, vous pourez pleinement profiter de nos services !');
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
