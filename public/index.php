<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__.'/../bootstrap/init.php';

$app_name = getenv('APP_NAME');


use Illuminate\Database\Capsule\Manager as Capsule;

$user = Capsule::table('users')->where('id', 1)->first();
