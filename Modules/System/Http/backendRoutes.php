<?php
//manager users
$router->get('/users', 'UserController@index')->name('admin.system.user.index');
$router->get('users/{users}/edit', 'UserController@edit')->name('admin.system.user.edit');


$router->get('/users/role', ['use' => 'UserController@role', 'as' => 'admin.system.role.index']);
