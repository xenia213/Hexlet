<?php

/**
 * Реализуйте функцию getSameParity, которая принимает на вход список и 
 * возвращает новый, состоящий из элементов, у которых такая же четность, 
 * как и у первого элемента входного списка.
 */

function getSameParity($array)
{
    if (empty($array)) {
        return $array;
    }
    [$num] = $array;
    return array_values(array_filter($array, function ($arr) use ($num) {
        if ($num % 2 == 0) {
            return $arr % 2 == 0;
        } else {
            return $arr % 2 > 0 || $arr % 2 < 0;
        }
    }));
}
