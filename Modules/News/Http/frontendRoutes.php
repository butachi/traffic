<?php
$router->get('/', ['uses' => 'NewsController@index', 'as' => 'homepage']);
$router->get('/search', ['uses' => 'NewsController@search', 'as' => 'new.search']);