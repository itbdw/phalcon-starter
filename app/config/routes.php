<?php

$router = new Phalcon\Mvc\Router(false);

//By default the URI information is obtained from the $_GET["_url"] variable, this is passed by the Rewrite-Engine to Phalcon, you can also use $_SERVER["REQUEST_URI"] if required:
//可以使用传统的 try_files $uri $uri/ /index.php?$query_string;
$router->setUriSource(
    \Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI
);

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
