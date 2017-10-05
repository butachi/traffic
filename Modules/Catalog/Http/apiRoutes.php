<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/catalog', 'middleware' => 'api.token'], function (Router $router) {
        $router->post('/category/update', [
                'as' => 'api.category.update',
                'uses' => 'CategoryController@update',
                'middleware' => 'token-can:catalog.category.edit',
            ]);
        $router->post('/delete', [
                'as' => 'api.category.delete',
                'uses' => 'CategoryController@delete',
                'middleware' => 'token-can:catalog.category.destroy',
            ]);
    });
