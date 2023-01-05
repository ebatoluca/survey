<?php

use Illuminate\Support\Facades\Route;

Route::prefix('attempt')
	->as('attempt.')
	->group(base_path('routes/api/models/attempt.php'));

Route::prefix('classroom')
	->as('classroom.')
	->group(base_path('routes/api/models/classroom.php'));

Route::prefix('course-category')
	->as('course_category.')
	->group(base_path('routes/api/models/course_category.php'));

Route::prefix('course')
	->as('course.')
	->group(base_path('routes/api/models/course.php'));

Route::prefix('period')
	->as('period.')
	->group(base_path('routes/api/models/period.php'));

Route::prefix('student')
	->as('student.')
	->group(base_path('routes/api/models/student.php'));

Route::prefix('survey-answer')
	->as('survey_answer.')
	->group(base_path('routes/api/models/survey_answer.php'));

Route::prefix('survey-category')
	->as('survey_category.')
	->group(base_path('routes/api/models/survey_category.php'));

Route::prefix('survey-question')
	->as('survey_question.')
	->group(base_path('routes/api/models/survey_question.php'));

Route::prefix('survey')
	->as('survey.')
	->group(base_path('routes/api/models/survey.php'));

Route::prefix('teacher')
	->as('teacher.')
	->group(base_path('routes/api/models/teacher.php'));

Route::prefix('user')
	->as('user.')
	->group(base_path('routes/api/models/user.php'));