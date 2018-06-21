<?php

namespace App\Controllers\Admin;

class ControllerBase extends \App\Controllers\ControllerBase
{

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getViewsDir() . 'admin/');
    }
}
