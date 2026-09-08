<?php

namespace App\Policies;

use App\Models\Mission;
use App\Models\User;

class MissionPolicy
{
    public function view(User $user, Mission $mission): bool
    {
        return $mission->id_hopital === $user->id;
    }

    public function update(User $user, Mission $mission): bool
    {
        return $mission->id_hopital === $user->id;
    }

    public function delete(User $user, Mission $mission): bool
    {
        return $mission->id_hopital === $user->id;
    }
}