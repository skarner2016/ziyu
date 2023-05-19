<?php

namespace app\enum;

/**
 * @desc
 * @author  skarner <2023-05-18 18:50>
 */
enum MessageCode: string
{
    case Register = 'register';
    
    public static function values(): array
    {
        return array_column(self::cases(), 'name');
    }
    
    /**
     * @desc    获取限频次数(1小时)
     * @param $type
     * @return int
     * @author  skarner <2023-05-19 14:44>
     */
    public static function getRateLimit($type): int
    {
        return match ($type) {
            (MessageCode::Register)->value=> 6,
        };
    }
    
    /**
     * @desc    错误码最大错误次数
     * @param $type
     * @return int
     * @author  skarner <2023-05-19 14:51>
     */
    public static function getMaxRetry($type): int
    {
        return match ($type) {
            (MessageCode::Register)->value => 5,
        };
    }
    
    /**
     * @desc    验证码有效期(秒)
     * @param $type
     * @return int
     * @author  skarner <2023-05-19 14:52>
     */
    public static function getValidTime($type): int
    {
        return match ($type) {
            (MessageCode::Register)->value => 600,
        };
    }
}