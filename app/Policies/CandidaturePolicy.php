<?php

namespace App\Policies;

use App\Models\Candidature;
use App\Models\User;

class CandidaturePolicy
{
    // Vérifier que le médecin peut consulter sa candidature
    public function view(User $user, Candidature $candidature): bool
    {
        return $candidature->id_medecin === $user->id;
    }

    // Vérifier que l'utilisateur est un médecin
    public function create(User $user): bool
    {
        return $user->role === 'medecin';
    }

    // Vérifier que le médecin peut modifier sa candidature
    public function update(User $user, Candidature $candidature): bool
    {
        return $candidature->id_medecin === $user->id;
    }

    // Vérifier que le médecin peut supprimer sa candidature
    public function delete(User $user, Candidature $candidature): bool
    {
        return $candidature->id_medecin === $user->id;
    }

    // Vérifier que l'hôpital peut accepter ou refuser la candidature
    public function updateStatut(User $user, Candidature $candidature): bool
    {
        return $user->role === 'hopital'
            && $candidature->mission->id_hopital === $user->id;
    }
}