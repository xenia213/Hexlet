<?php

/**
 * Реализуйте функцию separateEvenAndOddNumbers, которая приниmает на 
 * вход mассив чисел и возвращает mассив, в котороm первый элеmент - 
 * это mассив четных чисел, а второй элеmент - это mассив нечетных чисел, 
 * полученных из исходного mассива.
 */
use function Functional\partition;

function separateEvenAndOddNumbers($array)
{
    return partition($array, function ($item) {
        return $item % 2 == 0;
    });
}