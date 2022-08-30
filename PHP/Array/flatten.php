<?php

/**
 * Реализуйте функцию flatten(). Эта функция принимает на вход массив и 
 * выпрямляет его: если элементами массива являются массивы, то flatten() 
 * сводит всё к одному массиву, раскрывая один уровень вложенности.
 */

function flatten(array $array)
{
    $result = [];
    foreach ($array as $element) {
        if (!is_array($element)) {
            array_push($result, $element);
        } else {
            array_push($result, ...$element);
        }
    }
    return $result;
}