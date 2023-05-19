<?php

namespace app\cache\key;

class Common
{
    /**
     * @desc    验证码
     * @param $type
     * @param $account
     * @return string
     * @author  skarner <2023-05-19 16:54>
     */
    public function messageCode($type, $account): string
    {
        return sprintf("message_code:%s:%s:%s", $type, 'code',$account);
    }
    
    public function messageCodeRateLimit($type, $account): string
    {
        return sprintf("message_code:%s:%s:%s", $type, 'rate_limit', $account);
    }
    
}