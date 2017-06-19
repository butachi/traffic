<?php
//manager users
$router->get('/users', 'UserController@index')->name('admin.system.user.index');
$router->get('users/create', 'UserController@create')->name('admin.system.user.create');
$router->post('users/create', 'UserController@store')->name('admin.system.user.store');
$router->get('users/{users}/edit', 'UserController@edit')->name('admin.system.user.edit');
$router->post('users/{users}/edit', 'UserController@update')->name('admin.system.user.update');


$router->get('/users/role', ['use' => 'UserController@role', 'as' => 'admin.system.role.index']);
