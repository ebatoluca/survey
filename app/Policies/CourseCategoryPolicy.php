<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CourseCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseCategoryPolicy
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

    public function view(User $user, CourseCategory $courseCategory)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, CourseCategory $courseCategory)
    {
        return false;
    }

    public function delete(User $user, CourseCategory $courseCategory)
    {
        return false;
    }

    public function restore(User $user, CourseCategory $courseCategory)
    {
        return false;
    }

    public function forceDelete(User $user, CourseCategory $courseCategory)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
