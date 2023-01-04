<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'AttemptController@policies')
	->name('policies');

Route::post('policy', 'AttemptController@policy')
	->name('policy');

Route::post('index', 'AttemptController@index')
	->name('index');

Route::post('show', 'AttemptController@show')
	->name('show');

Route::post('create', 'AttemptController@create')
	->name('create');

Route::put('update', 'AttemptController@update')
	->name('update');

Route::delete('delete', 'AttemptController@delete')
	->name('delete');

Route::post('restore', 'AttemptController@restore')
	->name('restore');

Route::delete('force-delete', 'AttemptController@forceDelete')
	->name('force.delete');

Route::post('export', 'AttemptController@export')
	->name('export');