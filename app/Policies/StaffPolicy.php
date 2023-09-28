<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function view(User $user, Dashboard $dashboard)
    {
        return $user->hasRole('staff');
    }
}
