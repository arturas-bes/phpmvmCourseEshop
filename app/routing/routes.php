<?php

$router = new AltoRouter;
$router->setBasePath('/phpmvm/public');

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

//admin route
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
