<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'SurveyAnswerController@policies')
	->name('policies');

Route::post('policy', 'SurveyAnswerController@policy')
	->name('policy');

Route::post('index', 'SurveyAnswerController@index')
	->name('index');

Route::post('show', 'SurveyAnswerController@show')
	->name('show');

Route::post('create', 'SurveyAnswerController@create')
	->name('create');

Route::put('update', 'SurveyAnswerController@update')
	->name('update');

Route::delete('delete', 'SurveyAnswerController@delete')
	->name('delete');

Route::post('restore', 'SurveyAnswerController@restore')
	->name('restore');

Route::delete('force-delete', 'SurveyAnswerController@forceDelete')
	->name('force.delete');

Route::post('export', 'SurveyAnswerController@export')
	->name('export');