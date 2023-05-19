<?php
/**
 * @desc
 * @author  skarner <2023-05-19 17:07>
 */

namespace app\enum;

enum Error: int
{
    // 全局 error
    case CodeSuccess = 200;
    case CodeUnknown = 500;
    
    // 通用业务 error
    case CodeGetMessageCodeTooMuch = 1001;
}