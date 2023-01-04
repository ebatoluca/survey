<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'SurveyController@policies')
	->name('policies');

Route::post('policy', 'SurveyController@policy')
	->name('policy');

Route::post('index', 'SurveyController@index')
	->name('index');

Route::post('show', 'SurveyController@show')
	->name('show');

Route::post('create', 'SurveyController@create')
	->name('create');

Route::put('update', 'SurveyController@update')
	->name('update');

Route::delete('delete', 'SurveyController@delete')
	->name('delete');

Route::post('restore', 'SurveyController@restore')
	->name('restore');

Route::delete('force-delete', 'SurveyController@forceDelete')
	->name('force.delete');

Route::post('export', 'SurveyController@export')
	->name('export');