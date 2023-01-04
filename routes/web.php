<?php

use Illuminate\Support\Facades\Route;

Route::get('{any?}', 'AppController@app')->where('any', '^(?!api).*$')->name('app');