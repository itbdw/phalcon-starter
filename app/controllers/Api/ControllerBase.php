<?php

namespace App\Controllers\Api;

class ControllerBase extends \App\Controllers\ControllerBase
{

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getViewsDir() . 'api/');
    }
}
