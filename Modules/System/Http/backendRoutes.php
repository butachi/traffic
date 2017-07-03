<?php
//user management
$router->group(['prefix' => '/users'], function ($router) {
        //manager users
        $router->get('/', 'UserController@index')->name('admin.system.user.index');
        $router->get('/create', 'UserController@create')->name('admin.system.user.create');
        $router->post('/create', 'UserController@store')->name('admin.system.user.store');
        $router->get('/{users}/edit', 'UserController@edit')->name('admin.system.user.edit');
        $router->post('/{users}/edit', 'UserController@update')->name('admin.system.user.update');

        //manager roles
        $router->get('/role', ['use' => 'RoleController@role', 'as' => 'admin.system.role.index']);

        //manager profile
        $router->get('/profile', 'ProfileController@index')->name('admin.system.profile.index');
        $router->get('/profile/create', 'ProfileController@create')->name('admin.system.profile.create');
        $router->get('/profile/{id}/edit', 'ProfileController@edit')->name('admin.system.profile.edit');
        $router->put('/profile/{id}/edit', 'ProfileController@update')->name('admin.system.profile.update');
    });