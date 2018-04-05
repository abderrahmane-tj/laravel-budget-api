<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('accounts', 'AccountsController@index');
Route::post('accounts', 'AccountsController@store');