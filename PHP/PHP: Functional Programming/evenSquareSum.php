<?php

/**
 * Реализуйте функцию evenSquareSum, которая принимает на вход массив 
 * и возвращает сумму квадратов четных чисел.
 */

function evenSquareSum($array)
{
    $evenNumbers = select($array, function ($item) {
        return $item % 2 === 0;
    });

    $squaredNumbers = map($evenNumbers, function ($item) {
        return $item ** 2;
    });

    return array_sum($squaredNumbers);
}