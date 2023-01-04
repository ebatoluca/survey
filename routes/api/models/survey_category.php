<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'SurveyCategoryController@policies')
	->name('policies');

Route::post('policy', 'SurveyCategoryController@policy')
	->name('policy');

Route::post('index', 'SurveyCategoryController@index')
	->name('index');

Route::post('show', 'SurveyCategoryController@show')
	->name('show');

Route::post('create', 'SurveyCategoryController@create')
	->name('create');

Route::put('update', 'SurveyCategoryController@update')
	->name('update');

Route::delete('delete', 'SurveyCategoryController@delete')
	->name('delete');

Route::post('restore', 'SurveyCategoryController@restore')
	->name('restore');

Route::delete('force-delete', 'SurveyCategoryController@forceDelete')
	->name('force.delete');

Route::post('export', 'SurveyCategoryController@export')
	->name('export');