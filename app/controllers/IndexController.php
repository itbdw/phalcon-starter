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

    /**
     * 
     */
    public function p404Action() {
        $this->response->setStatusCode(404);
        $this->response->setContent("NOT FOUND");

        return $this->response;
    }

}
