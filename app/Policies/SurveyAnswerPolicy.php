<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SurveyAnswer;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyAnswerPolicy
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

    public function view(User $user, SurveyAnswer $surveyAnswer)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, SurveyAnswer $surveyAnswer)
    {
        return false;
    }

    public function delete(User $user, SurveyAnswer $surveyAnswer)
    {
        return false;
    }

    public function restore(User $user, SurveyAnswer $surveyAnswer)
    {
        return false;
    }

    public function forceDelete(User $user, SurveyAnswer $surveyAnswer)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
