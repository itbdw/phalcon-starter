<?php

error_reporting(E_ALL);
date_default_timezone_set('PRC');

use Phalcon\Mvc\Application;

define("PS_ROOT_DIR", dirname(__DIR__));

//composer
require PS_ROOT_DIR . '/vendor/autoload.php';


try {

    /**
     * Read the configuration
     */
    $config = include PS_ROOT_DIR . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include PS_ROOT_DIR . "/app/config/loader.php";

    /**
     * Read services
     */
    include PS_ROOT_DIR . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new Application($di);

    $application->handle()->send();

} catch (\Exception $e) {

    if ($e instanceof \Phalcon\Mvc\Dispatcher\Exception) {
        $application->response->setStatusCode(404);
        $application->response->setContent("URI NOT FOUND!");
        $application->response->send();
        return ;
    }

    if (EnvParser::getItem('APP_DEBUG')) {
        dd($e->getTraceAsString());
    } else {
        $application->response->setStatusCode(503);
        $application->response->setContent("SERVER ERROR");
        $application->response->send();
    }

    $application->logger->alert(print_r($e->getMessage(), true));
}
