<?php

namespace App\Listeners;

use App\Events\CandidatureRefusee;
use App\Notifications\CandidatureRefuseeNotification;

class EnvoyerNotificationCandidatureRefusee
{
    /**
     * Traiter l'événement.
     */
    public function handle(CandidatureRefusee $event): void
    {
        $candidature = $event->candidature;

        // Récupérer le médecin concerné
        $medecin = $candidature->medecin;

        // Envoyer la notification au médecin
        $medecin->user->notify(
            new CandidatureRefuseeNotification()
        );
    }
}