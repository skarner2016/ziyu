<?php
/**
 * Here is your custom functions.
 */

if (!function_exists('generate_message_code')) {
    function generate_message_code(): int
    {
        return rand(100000, 999999);
    }
}