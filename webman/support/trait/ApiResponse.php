<?php

namespace support\trait;

use app\enum\Error;

trait ApiResponse
{
    public function failed($code, $message = "", $data = [])
    {
        return json([
            'code' => $code,
            'msg'  => $message,
            'data' => $data,
        ]);
    }
    
    public function success($code = Error::CodeSuccess, $message = "", $data = [])
    {
        return json([
            'code' => $code,
            'msg'  => $message,
            'data' => $data,
        ]);
    }
}