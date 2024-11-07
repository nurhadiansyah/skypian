<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessAdmin(User $User)
    {
        return $User->level === 1; // Ganti dengan logika yang sesuai
    }
}
