<?php

namespace App\Policies;

use App\Models\Specialite;
use App\Models\User;

class SpecialitePolicy
{
    // Voir les spécialités
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Voir une spécialité
    public function view(User $user, Specialite $specialite): bool
    {
        return $user->role === 'admin';
    }

    // Créer une spécialité
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Modifier une spécialité
    public function update(User $user, Specialite $specialite): bool
    {
        return $user->role === 'admin';
    }

    // Supprimer une spécialité
    public function delete(User $user, Specialite $specialite): bool
    {
        return $user->role === 'admin';
    }
}