<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'CourseController@policies')
	->name('policies');

Route::post('policy', 'CourseController@policy')
	->name('policy');

Route::post('index', 'CourseController@index')
	->name('index');

Route::post('show', 'CourseController@show')
	->name('show');

Route::post('create', 'CourseController@create')
	->name('create');

Route::put('update', 'CourseController@update')
	->name('update');

Route::delete('delete', 'CourseController@delete')
	->name('delete');

Route::post('restore', 'CourseController@restore')
	->name('restore');

Route::delete('force-delete', 'CourseController@forceDelete')
	->name('force.delete');

Route::post('export', 'CourseController@export')
	->name('export');