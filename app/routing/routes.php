<?php

$router = new AltoRouter;
$router->setBasePath('');
// home route
$router->map(
    'GET',
    '/',
    'App\Controllers\IndexController@show',
    'home'
);

// admin routes moved to external file
require_once __DIR__.'/admin_routes.php';
