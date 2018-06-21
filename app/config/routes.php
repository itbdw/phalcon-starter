<?php

$router = new Phalcon\Mvc\Router(false);

$router->add('/', [
    'namespace'  => 'App\Controllers',
    'controller' => 'index',
    'action'     => 'index',
]);

$router->add('/:controller/:action', [
    'namespace'  => 'App\Controllers',
    'controller' => 1,
    'action'     => 2,
]);

$router->add('/:controller', [
    'namespace'  => 'App\Controllers',
    'controller' => 1
]);

$router->add('/admin/:controller/:action', [
    'namespace'  => 'App\Controllers\Admin',
    'controller' => 1,
    'action'     => 2,
]);

$router->add('/admin/:controller', [
    'namespace'  => 'App\Controllers\Admin',
    'controller' => 1
]);

$router->add('/api/:controller/:action', [
    'namespace'  => 'App\Controllers\Api',
    'controller' => 1,
    'action'     => 2,
]);

$router->add('/api/:controller', [
    'namespace'  => 'App\Controllers\Api',
    'controller' => 1
]);


$router->notFound([
    "controller" => "index",
    "action" => "p404"
]);

return $router;
