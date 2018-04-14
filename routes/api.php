<?php

Route::middleware(['accept-json'])->group(function (){
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('accounts', 'AccountsController@index');
    Route::post('accounts', 'AccountsController@store');
    Route::put('accounts/{account}', 'AccountsController@update');

    Route::get('accounts/{account}/transactions', 'TransactionsController@index');
});
