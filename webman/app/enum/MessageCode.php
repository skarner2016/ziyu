<?php

namespace app\enum;

/**
 * @desc
 * @author  skarner <2023-05-18 18:50>
 */
enum MessageCode
{
    case Register;
    
    public function getLowerName(): string
    {
        return strtolower($this->name);
    }
    
    public function getRateLimit(): int
    {
        // TODO:
        
        return 0;
    }
}