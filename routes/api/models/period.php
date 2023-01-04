<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'PeriodController@policies')
	->name('policies');

Route::post('policy', 'PeriodController@policy')
	->name('policy');

Route::post('index', 'PeriodController@index')
	->name('index');

Route::post('show', 'PeriodController@show')
	->name('show');

Route::post('create', 'PeriodController@create')
	->name('create');

Route::put('update', 'PeriodController@update')
	->name('update');

Route::delete('delete', 'PeriodController@delete')
	->name('delete');

Route::post('restore', 'PeriodController@restore')
	->name('restore');

Route::delete('force-delete', 'PeriodController@forceDelete')
	->name('force.delete');

Route::post('export', 'PeriodController@export')
	->name('export');