<?php

/**
 * Реализуйте функцию separateEvenAndOddNumbers, которая принимает на 
 * вход массив чисел и возвращает массив, в котором первый элемент - 
 * это массив четных чисел, а второй элемент - это массив нечетных чисел, 
 * полученных из исходного массива.
 */
use function Functional\partition;

function separateEvenAndOddNumbers($array)
{
    return partition($array, function ($item) {
        return $item % 2 == 0;
    });
}