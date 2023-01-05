<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Attempt' => 'App\Policies\AttemptPolicy',
        'App\Models\Classroom' => 'App\Policies\ClassroomPolicy',
        'App\Models\CourseCategory' => 'App\Policies\CourseCategoryPolicy',
        'App\Models\Course' => 'App\Policies\CoursePolicy',
        'App\Models\Period' => 'App\Policies\PeriodPolicy',
        'App\Models\Student' => 'App\Policies\StudentPolicy',
        'App\Models\SurveyAnswer' => 'App\Policies\SurveyAnswerPolicy',
        'App\Models\SurveyCategory' => 'App\Policies\SurveyCategoryPolicy',
        'App\Models\Survey' => 'App\Policies\SurveyPolicy',
        'App\Models\SurveyQuestion' => 'App\Policies\SurveyQuestionPolicy',
        'App\Models\Teacher' => 'App\Policies\TeacherPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
