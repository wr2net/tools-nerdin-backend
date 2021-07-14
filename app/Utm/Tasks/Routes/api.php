<?php

use Illuminate\Support\Facades\Route;

//middleware(['auth:api'])->
Route::get('tasks', 'TaskController@index')
    ->name('index');

Route::post('tasks', 'TaskController@store')
    ->name('store');

Route::get('tasks/{task}', 'TaskController@show')
    ->name('show');

Route::put('tasks/{task}', 'TaskController@update')
    ->name('update');

Route::patch('tasks/{task}/disable', 'TaskController@disable')
    ->name('disable');

Route::patch('tasks/{task}/enable', 'TaskController@enable')
    ->name('enable');

Route::delete('tasks/{tasks}', 'TaskController@destroy')
    ->name('destroy');
