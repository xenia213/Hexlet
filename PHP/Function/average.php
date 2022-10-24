<?php

/**
 * Реализуйте функцию average, которая возвращает среднее 
 * арифметическое всех переданных аргументов. Если функции не 
 * передать ни одного аргумента, то она должна вернуть null.
 */

 function average(...$num)
 {
    $sum = array_sum($num);
    if (empty($num)) {
        return null;
    } elseif ($sum == 0) {
        return 0;
    } else {
        return $sum / count($num);
    }
 }
