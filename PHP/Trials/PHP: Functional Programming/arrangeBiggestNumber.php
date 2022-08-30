<?php

/**
 * Реализуйте функцию arrangeBiggestNumber, которая составляет самое
 * большое число из переданного массива чисел и возвращает его строковое 
 * представление. Например, из чисел [3, 24, 4] мы можем составить 
 * такие: 3244, 3424, 2434, 2443, 4324, 4243 и самое больше из них — 
 * это 4324.
 */
function arrangeBiggestNumber($array)
{
    $result = [];
    if (!empty($array)) {
        $maxLength = max(array_map('strlen', $array));
        foreach ($array as $arr) {
            $key = str_pad((string) $arr, $maxLength, $arr);
            $result[$key] = array_key_exists($key, $result) ? $result[$key] . $arr : $arr;
        }
        ksort($result);
        $result = array_reverse($result);
        return (implode('', $result));
    } else {
        return null;
    }
}