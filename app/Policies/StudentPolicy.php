<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
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

    public function view(User $user, Student $student)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Student $student)
    {
        return false;
    }

    public function delete(User $user, Student $student)
    {
        return false;
    }

    public function restore(User $user, Student $student)
    {
        return false;
    }

    public function forceDelete(User $user, Student $student)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
