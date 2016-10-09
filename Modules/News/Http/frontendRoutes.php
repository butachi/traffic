<?php
$router->get('/', ['uses' => 'NewsController@index', 'as' => 'index']);