<?php

/**
 * Реализуйте функцию getSameCount, которая считает количество общих 
 * уникальных элементов для двух массивов. Аргументы:
 * Первый массив
 * Второй массив
 */

function getSameCount($one, $two)
{
    $unique_one = array_values(array_unique($one));
    $unique_two = array_values(array_unique($two));
    $sum_one = array_sum($unique_one);
    $sum = 0;
    if ((!empty($unique_one)) && ($sum_one !== 0)) {
        for ($i = 0; $i < sizeof($unique_one); $i++) {
            $sum = in_array($unique_one[$i], $unique_two) ? $sum + 1 : $sum + 0;
        }
        return $sum;
    } else {
            return 0;
    }
}