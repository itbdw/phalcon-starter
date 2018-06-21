<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader
    ->registerNamespaces(
        [
            'App' => __DIR__ . '/../',
            'App\\Controllers' => __DIR__ . '/../controllers',
            'App\\Models' => __DIR__ . '/../models',            
        ]
    )->register();
