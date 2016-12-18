<?php

Route::group(['middleware' => 'web', 'prefix' => 'catalog', 'namespace' => 'Modules\Catalog\Http\Controllers'], function()
{
    Route::get('/', 'CatalogController@index');
});
