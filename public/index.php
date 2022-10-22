<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';

use App\Application;

$app = new Application();

$app->router->get('/', function(){
  echo "hello world";
});
$app->router->get('/contact', function(){
  echo "contact";
});
$app->run();