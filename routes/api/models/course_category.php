<?php

use Illuminate\Support\Facades\Route;

Route::post('policies', 'CourseCategoryController@policies')
	->name('policies');

Route::post('policy', 'CourseCategoryController@policy')
	->name('policy');

Route::post('index', 'CourseCategoryController@index')
	->name('index');

Route::post('show', 'CourseCategoryController@show')
	->name('show');

Route::post('create', 'CourseCategoryController@create')
	->name('create');

Route::put('update', 'CourseCategoryController@update')
	->name('update');

Route::delete('delete', 'CourseCategoryController@delete')
	->name('delete');

Route::post('restore', 'CourseCategoryController@restore')
	->name('restore');

Route::delete('force-delete', 'CourseCategoryController@forceDelete')
	->name('force.delete');

Route::post('export', 'CourseCategoryController@export')
	->name('export');