<?php

Route::group(['middleware' => 'web', 'prefix' => 'resport', 'namespace' => 'Modules\Resport\Http\Controllers'], function()
{
    Route::get('/', 'ResportController@index');
});
