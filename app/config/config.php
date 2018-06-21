<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter'     => 'Mysql',
            'host'        => 'localhost',
            'username'    => 'root',
            'password'    => '',
            'dbname'      => 'test',
        ],
        'application' => [
            'controllersDir' => __DIR__ . '/../../app/controllers/',
            'modelsDir'      => __DIR__ . '/../../app/models/',
            'viewsDir'       => __DIR__ . '/../../app/views/',
            'librariesDir'     => __DIR__ . '/../../app/libraries/',
            'cacheDir'       => __DIR__ . '/../../app/storage/cache/',
            'logDir'         => __DIR__ . '/../../app/storage/logs/',
            'baseUri'        => '/',
        ]
    ]
);
