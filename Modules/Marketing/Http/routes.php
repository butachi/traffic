<?php

Route::group(['middleware' => 'web', 'prefix' => 'marketing', 'namespace' => 'Modules\Marketing\Http\Controllers'], function()
{
    Route::get('/', 'MarketingController@index');
});
