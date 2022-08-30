<?php

/**
 * Вес Хэмминга это количество единиц в двоичном представлении числа.
 * 
 * Реализуйте функцию hammingWeight(), которая считает вес Хэмминга.
 */

function hammingWeight($num)
{
    $result = decbin($num);
    $sum = 0;
    for ($i = 0; $i < strlen($result); $i++) {
        if ($result[$i] == 1) {
            $sum++;
        }
    }
    return $sum;
}