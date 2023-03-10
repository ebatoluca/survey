<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Period;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriodPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = [];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {
        return false;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Period $period)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Period $period)
    {
        return false;
    }

    public function delete(User $user, Period $period)
    {
        return false;
    }

    public function restore(User $user, Period $period)
    {
        return false;
    }

    public function forceDelete(User $user, Period $period)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
