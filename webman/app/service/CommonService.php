<?php

namespace app\service;

use app\enum\App;
use support\Redis;
use app\enum\MessageCode;
use app\enum\Error;
use app\cache\key\Common;
use Illuminate\Support\Arr;
use support\exception\ApiException;

class CommonService
{
    public function getCodeByType($account, $type)
    {
        
        // TODO: 逻辑有问题
        $rateLimit      = MessageCode::getRateLimit($type);
        $rateLimitCache = $this->getUserRateLimitByType($account, $type);
        
        if ($rateLimitCache >= $rateLimit) {
            throw new ApiException(Error::CodeGetMessageCodeTooMuch->value);
        }
        
        $code = generate_random_code();
        $ttl  = 60 * 60;
        $this->increMessageCodeItem($account, $type, $rateLimitCache + 1, $ttl);
        $this->setMessageCode($account, $type, $code);
        
        return $code;
    }
    
    private function getMessageCodeCacheKey($account, $type): string
    {
        return (new Common())->messageCode($type, $account);
    }
    
    private function getMessageCodeRateLimitCacheKey($account, $type): string
    {
        return (new Common())->messageCodeRateLimit($type, $account);
    }
    
    
    private function getUserRateLimitByType($account, $type)
    {
        $cacheKey = $this->getMessageCodeRateLimitCacheKey($account, $type);
        
        return Redis::connection(App::REDIS_DEFAULT)
            ->client()
            ->get($cacheKey);
    }
    
    private function increMessageCodeItem($account, $type, $value, $ttl)
    {
    
        $cacheKey = $this->getMessageCodeRateLimitCacheKey($account, $type);
    
        dump(__METHOD__, __LINE__, $cacheKey, $value);
    
    
        if ($value == 1) {
            return Redis::connection(App::REDIS_DEFAULT)
                ->client()
                ->setEx($cacheKey, $ttl, $value);
        }
        
        return Redis::connection(App::REDIS_DEFAULT)
            ->client()
            ->set($cacheKey, $value);
    }
    
    private function setMessageCode($account, $type, $code): bool
    {
        $cacheKey = $this->getMessageCodeCacheKey($account, $type);
        $ttl      = MessageCode::getValidTime($type);
        
        return Redis::connection(App::REDIS_DEFAULT)
            ->client()
            ->setEx($cacheKey, $ttl, $code);
    }
    
}
