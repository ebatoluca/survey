<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'ClassroomController@policies')
	->name('policies');

Route::post('policy', 'ClassroomController@policy')
	->name('policy');

Route::post('index', 'ClassroomController@index')
	->name('index');

Route::post('show', 'ClassroomController@show')
	->name('show');

Route::post('create', 'ClassroomController@create')
	->name('create');

Route::put('update', 'ClassroomController@update')
	->name('update');

Route::delete('delete', 'ClassroomController@delete')
	->name('delete');

Route::post('restore', 'ClassroomController@restore')
	->name('restore');

Route::delete('force-delete', 'ClassroomController@forceDelete')
	->name('force.delete');

Route::post('export', 'ClassroomController@export')
	->name('export');