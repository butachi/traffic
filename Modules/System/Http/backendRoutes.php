<?php
$router->get('/users', 'UserController@index')->name('admin.system.user.index');
$router->get('/users/role', ['use' => 'UserController@role', 'as' => 'admin.system.role.index']);
