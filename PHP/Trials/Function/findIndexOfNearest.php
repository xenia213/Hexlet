<?php

/**
 * Реализуйте функцию findIndexOfNearest, которая принимает на вход массив 
 * чисел и искомое число. Задача функции — найти в массиве ближайшее число
 * к искомому и вернуть его индекс в массиве.
 * 
 * Если в массиве содержится несколько чисел, одновременно являющихся 
 * ближайшими к искомому числу, то возвращается наименьший из индексов 
 * ближайших чисел.
 */

function findIndexOfNearest(array $array, int $num)
{
    if (empty($array)) {
        return null;
    }
    return array_reduce(array_keys($array), function ($acc, $i) use ($array, $num) {
        return abs($array[$i] - $num) < abs($array[$acc] - $num) ? $i : $acc;
    }, 0);
}




