<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'UserController@policies')
	->name('policies');

Route::post('policy', 'UserController@policy')
	->name('policy');

Route::post('index', 'UserController@index')
	->name('index');

Route::post('show', 'UserController@show')
	->name('show');

Route::post('create', 'UserController@create')
	->name('create');

Route::put('update', 'UserController@update')
	->name('update');

Route::delete('delete', 'UserController@delete')
	->name('delete');

Route::post('restore', 'UserController@restore')
	->name('restore');

Route::delete('force-delete', 'UserController@forceDelete')
	->name('force.delete');

Route::post('export', 'UserController@export')
	->name('export');