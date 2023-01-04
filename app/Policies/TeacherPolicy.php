<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
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

    public function view(User $user, Teacher $teacher)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Teacher $teacher)
    {
        return false;
    }

    public function delete(User $user, Teacher $teacher)
    {
        return false;
    }

    public function restore(User $user, Teacher $teacher)
    {
        return false;
    }

    public function forceDelete(User $user, Teacher $teacher)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
