<?php

namespace App\Controllers;

use Phalcon\Http\Response;
use Phalcon\Logger;

/**
 * Class IndexController
 *
 * @property Logger $logger
 * @package App\Controllers
 */
class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $response = new Response();
        $response->setJsonContent(["hello"]);
        return $response;
    }


}
