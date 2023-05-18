<?php

namespace app\api\controller;

use support\Request;

class UserController
{
    public function register(Request $request)
    {
        
    }


    public function index(Request $request)
    {
        return response(__CLASS__);
    }
}
