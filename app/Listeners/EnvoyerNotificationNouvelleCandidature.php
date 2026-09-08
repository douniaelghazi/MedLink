<?php

namespace App\Listeners;

use App\Events\NouvelleCandidature;
use App\Notifications\NouvelleCandidatureNotification;

class EnvoyerNotificationNouvelleCandidature
{
    public function handle(NouvelleCandidature $event): void
    {
        $candidature = $event->candidature;

        $hopital = $candidature->mission->hopital;

        $hopital->user->notify(
            new NouvelleCandidatureNotification($candidature)
        );
    }
}