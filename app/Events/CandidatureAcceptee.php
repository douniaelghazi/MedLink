<?php

namespace App\Events;

use App\Models\Candidature;
use App\Models\Mission;
use App\Events\CandidatureAcceptee;
use Illuminate\Http\Request;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CandidatureAcceptee
{
    use Dispatchable, SerializesModels;

    public Candidature $candidature;

    // Recevoir la candidature acceptée
    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
    }
}