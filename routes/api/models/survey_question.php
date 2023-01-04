<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'SurveyQuestionController@policies')
	->name('policies');

Route::post('policy', 'SurveyQuestionController@policy')
	->name('policy');

Route::post('index', 'SurveyQuestionController@index')
	->name('index');

Route::post('show', 'SurveyQuestionController@show')
	->name('show');

Route::post('create', 'SurveyQuestionController@create')
	->name('create');

Route::put('update', 'SurveyQuestionController@update')
	->name('update');

Route::delete('delete', 'SurveyQuestionController@delete')
	->name('delete');

Route::post('restore', 'SurveyQuestionController@restore')
	->name('restore');

Route::delete('force-delete', 'SurveyQuestionController@forceDelete')
	->name('force.delete');

Route::post('export', 'SurveyQuestionController@export')
	->name('export');