<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'StudentController@policies')
	->name('policies');

Route::post('policy', 'StudentController@policy')
	->name('policy');

Route::post('index', 'StudentController@index')
	->name('index');

Route::post('show', 'StudentController@show')
	->name('show');

Route::post('create', 'StudentController@create')
	->name('create');

Route::put('update', 'StudentController@update')
	->name('update');

Route::delete('delete', 'StudentController@delete')
	->name('delete');

Route::post('restore', 'StudentController@restore')
	->name('restore');

Route::delete('force-delete', 'StudentController@forceDelete')
	->name('force.delete');

Route::post('export', 'StudentController@export')
	->name('export');