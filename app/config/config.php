<?php

use Phalcon\Config;
use Phalcon\Config\Adapter\Ini;

class EnvParser
{
    private static $instance = null;

    public static function getAll() {
        if (self::$instance === null) {
            self::$instance = new Ini(dirname(dirname(__DIR__)) . '/.env');
        }

        return self::$instance;
    }

    public static function getItem($key, $default='') {
        $env = self::getAll();
        if (isset($env[$key])) {
            return $env[$key];
        }
        return $default;
    }

    /**
     * @return Config
     */
    public static function getPSConfig() {
        $config = new Config(
            [
                'database' => [
                    'adapter'     => 'Mysql',
                    'host'        => EnvParser::getItem('DB_HOST', 'localhost'),
                    'port'        => EnvParser::getItem('DB_PORT', 3306),
                    'username'    => EnvParser::getItem('DB_USERNAME', 'root'),
                    'password'    => EnvParser::getItem('DB_PASSWORD', ''),
                    'dbname'      => EnvParser::getItem('DB_DATABASE', 'test'),
                    'charset'     => 'utf8mb4'
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

        return $config;
    }


}

return EnvParser::getPSConfig();
