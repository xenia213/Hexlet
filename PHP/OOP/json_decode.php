<?php

/**
 * Реализуйте функцию json_decode, которая работает почти как встроенная, 
 * но вместо возврата ошибки, выбрасывает исключение \Exception.
 */

function json_decode($json, $assoc = false)
{
    // BEGIN (write your solution here)
    \json_decode($json, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception("'{$json}' not readable");
    }
    $result = [];
    $search  = ["{", "}", " ", "\"", "\'"];
    $tmp = str_replace($search, "", $json);
    $tmp = explode(':', $tmp);
    foreach ($tmp as $k => $v) {
        if ($k == 0) {
            $result[$v] = '';
        }
        if ($k == 1) {
            $result['key'] = $v;
        }
    }
    return $result;
    // END
}