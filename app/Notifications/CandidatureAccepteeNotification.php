<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidatureAccepteeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    // Définir les canaux utilisés pour envoyer la notification
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    // Données enregistrées dans la base de données
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Votre candidature a été acceptée.',
        ];
    }

    // Contenu de l'e-mail
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Candidature acceptée')
            ->line('Votre candidature a été acceptée.')
            ->action('Voir mon espace', url('/dashboard'))
            ->line('Merci d’utiliser MedLink.');
    }

    // Données de la notification
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Votre candidature a été acceptée.',
        ];
    }
}