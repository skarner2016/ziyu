<?php
/**
 * Here is your custom functions.
 */

if (!function_exists('generate_random_code')) {
    function generate_random_code($length = 6): int
    {
        $min = str_pad('1', $length, '0');
        $max = str_pad('9', $length, '9');
        $min = intval($min);
        $max = intval($max);
        
        return rand($min, $max);
    }
}