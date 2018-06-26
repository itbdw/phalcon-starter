<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 *
 */
$di = new FactoryDefault();

$di->setShared('router', function () {
    return require __DIR__ . '/routes.php';
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(
        [
            '.volt'  => function ($view, $di) use ($config) {
                $volt = new VoltEngine($view, $di);

                $volt->setOptions(
                    [
                        'compiledPath'      => $config->application->cacheDir,
                        'compiledSeparator' => '_'
                    ]
                );

                return $volt;
            },
            // Generate Template files uses PHP itself as the template engine
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
        ]
    );

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {

    $adapter = '\Phalcon\Db\Adapter\Pdo\\'.$config->database->adapter;

    $connection = new $adapter([
        'host'     => $config->database->host,
        'port'     => $config->database->port,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset,
    ]);

    return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use ($config) {
    $metaData = new \Phalcon\Mvc\Model\Metadata\Files(
          [
              "metaDataDir" => $config->application->cacheDir,
          ]
    );

    return $metaData;
});

//
///**
// * Start the session the first time some component request the session service
// */
//$di->set('session', function () {
//    $session = new SessionAdapter();
//    $session->start();
//
//    return $session;
//});


$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('App\Controllers');

    return $dispatcher;
});

$di->set('logger', function () use ($config) {
    $logger = new Phalcon\Logger\Adapter\File($config->application->logDir . "".date("Y-m-d") . ".log");
    return $logger;
});
