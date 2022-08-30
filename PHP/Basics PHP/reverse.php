<?php

/**
 * Реализуйте функцию reverse(), которая 
 * переворачивает цифры в переданном числе:
 */

function reverse($num)
{
    $num_str = strval($num);
    $result = '';
    for ($i = 0; $i < strlen($num_str); $i++) {
        $result = "{$num_str[$i]}{$result}";
    }
    return $num > 0 ? (int)$result : -(int)$result;
}