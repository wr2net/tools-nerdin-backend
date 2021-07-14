<?php

use Illuminate\Support\Facades\Route;

//middleware(['auth:api'])->
Route::get('users', 'UserController@index')
    ->name('index');

Route::post('users', 'UserController@store')
    ->name('store');

Route::get('users/{user}', 'UserController@show')
    ->name('show');

Route::put('users/{user}', 'UserController@update')
    ->name('update');

Route::patch('users/{user}/disable', 'UserController@disable')
    ->name('disable');

Route::patch('users/{user}/enable', 'UserController@enable')
    ->name('enable');

Route::delete('users/{user}', 'UserController@destroy')
    ->name('destroy');
