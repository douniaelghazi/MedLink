<?php

namespace App\Notifications;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouvelleCandidatureNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Candidature $candidature
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Vous avez reçu une nouvelle candidature pour la mission : '
                . $this->candidature->mission->titre,
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle candidature')
            ->line('Vous avez reçu une nouvelle candidature.')
            ->line('Mission : ' . $this->candidature->mission->titre)
            ->action('Voir les candidatures', url('/hopital/candidatures'))
            ->line('Merci d’utiliser MedLink.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Vous avez reçu une nouvelle candidature.',
        ];
    }
}