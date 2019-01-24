<?php

$router = new AltoRouter;
$router->setBasePath('/phpmvm/public');

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
