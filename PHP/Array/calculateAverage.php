<?php

/**
 * Реализуйте функцию calculateAverage(), которая высчитывает среднее 
 * арифметическое элементов массива. Благодаря этой функции мы наконец-то 
 * посчитаем среднюю температуру по больнице. :)
 */

function calculateAverage($arr)
{
    if (empty($arr)) {
        return 0;
    }
    $sum = 0;
    foreach ($arr as $i) {
        $sum += $i;
    }
    $average = $sum / count($arr);
    return $average;
}
// END