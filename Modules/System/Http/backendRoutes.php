<?php
//user management
$router->group(['prefix' => '/user-management'], function ($router) {
        //manager users
        $router->get('users/', 'UserController@index')->name('admin.system.user.index');
        $router->get('users/create', 'UserController@create')->name('admin.system.user.create');
        $router->post('users/create', 'UserController@store')->name('admin.system.user.store');
        $router->get('users/{users}/edit', 'UserController@edit')->name('admin.system.user.edit');
        $router->post('users/{users}/edit', 'UserController@update')->name('admin.system.user.update');

        //manager roles
        $router->get('/roles', 'RoleController@index')->name('admin.system.role.index');

        //manager profile
        $router->get('/profiles', 'ProfileController@index')->name('admin.system.profile.index');
        $router->get('/profiles/create', 'ProfileController@create')->name('admin.system.profile.create');
        $router->get('/profiles/{id}/edit', 'ProfileController@edit')->name('admin.system.profile.edit');
        $router->put('/profiles/{id}/edit', 'ProfileController@update')->name('admin.system.profile.update');
    });