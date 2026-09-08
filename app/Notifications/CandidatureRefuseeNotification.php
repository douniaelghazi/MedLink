<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidatureRefuseeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Votre candidature a été refusée.',
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Candidature refusée')
            ->line('Votre candidature a été refusée.')
            ->action('Voir mon espace', url('/dashboard'))
            ->line('Merci d’utiliser MedLink.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Votre candidature a été refusée.',
        ];
    }
}