<?php

namespace app\service;

use Illuminate\Support\Arr;

class CommonService
{
    const CODE_TYPE_REGISTER = 'register';
    
    const CODE_CONFIG_VALID_TIME = 'valid_time'; // 有效期
    const CODE_CONFIG_MAX_RETRY  = 'max_retry';  // 重试错误次数
    const CODE_CONFIG_RATE_LIMIT = 'rate_limit'; // 重试错误次数(次/小时)
    
    const CODE_CONFIG_MAP = [
        self::CODE_TYPE_REGISTER => [
            self::CODE_CONFIG_VALID_TIME => 600,
            self::CODE_CONFIG_MAX_RETRY  => 5,
            self::CODE_CONFIG_RATE_LIMIT => 6,
        ],
    ];
    
    public function getCodeByType($type)
    {
        $rateLimit = Arr::get(CommonService::CODE_CONFIG_MAP, $type . '.' . CommonService::CODE_CONFIG_RATE_LIMIT);
        
        // 是否限频
        $rateLimitCache = 1;
    
    }
}
