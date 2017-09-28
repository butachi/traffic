<?php
//user management
$router->group(['prefix' => '/catalog'], function ($router) {
        //manager users
        $router->get('category/', 'CategoryController@index')->name('admin.catalog.category.index');

        //manager roles
        $router->get('/product', 'ProductController@index')->name('admin.catalog.product.index');


    });