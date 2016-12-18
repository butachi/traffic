<?php
$router->get('/users', ['use' => 'UserController@index', 'as' => 'admin.user.user.index']);
$router->get('/users/role', ['use' => 'UserController@role', 'as' => 'admin.user.role.index']);
