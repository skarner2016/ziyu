<?php

namespace app\api\controller;

use support\Request;

class ApiController
{
    public $uid;
    
    public function __construct()
    {
        // TODO: JWT
        $this->uid = 1;
    }
}
