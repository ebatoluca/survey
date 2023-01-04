<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'TeacherController@policies')
	->name('policies');

Route::post('policy', 'TeacherController@policy')
	->name('policy');

Route::post('index', 'TeacherController@index')
	->name('index');

Route::post('show', 'TeacherController@show')
	->name('show');

Route::post('create', 'TeacherController@create')
	->name('create');

Route::put('update', 'TeacherController@update')
	->name('update');

Route::delete('delete', 'TeacherController@delete')
	->name('delete');

Route::post('restore', 'TeacherController@restore')
	->name('restore');

Route::delete('force-delete', 'TeacherController@forceDelete')
	->name('force.delete');

Route::post('export', 'TeacherController@export')
	->name('export');