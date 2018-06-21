<?php

error_reporting(E_ALL);
date_default_timezone_set('PRC');

use Phalcon\Mvc\Application;

//composer
require dirname(__DIR__) . '/vendor/autoload.php';

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (\Exception $e) {

    $application->response->setStatusCode(503);
    $application->response->setContent("Server was sicked for now...");
    $application->response->send();

    $application->logger->alert($e->getTraceAsString());

}
