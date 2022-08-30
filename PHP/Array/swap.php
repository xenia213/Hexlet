<?php

/**
 * Реализуйте функцию swap, которая меняет местами два элемента относительно 
 * переданного индекса. Например, если передан индекс 5, то функция меняет 
 * местами элементы, находящиеся по индексам 4 и 6.
 * 
 * Параметры функции:
 * 
 * Массив
 * Индекс
 * Если хотя бы одного из индексов не существует, функция возвращает 
 * исходный массив.
 */

function swap($arr, $index)
{
    $left = $index - 1;
    $right = $index + 1;
    $len_arr = count($arr) - 1;
    $size = count($arr);
    $maxIndex = floor($size / 2);
    if (($left >= 0) && ($right <= $len_arr)) {
        for ($i = 0; $i < $maxIndex; $i++) {
            $mirrorIndex = $size - $i - 1;
            $temp = $arr[$i];
            $arr[$i] = $arr[$mirrorIndex];
            $arr[$mirrorIndex] = $temp;
        } return $arr;
    } else {
        return $arr;
    }
}