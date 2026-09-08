<?php

namespace App\Listeners;

use App\Events\CandidatureAcceptee;
use App\Notifications\CandidatureAccepteeNotification;

class EnvoyerNotificationCandidatureAcceptee
{
    /**
     * Traiter l'événement.
     */
    public function handle(CandidatureAcceptee $event): void
    {
        $candidature = $event->candidature;

        // Récupérer le médecin concerné
        $medecin = $candidature->medecin;

        // Envoyer la notification au médecin
        $medecin->user->notify(
            new CandidatureAccepteeNotification()
        );
    }
}