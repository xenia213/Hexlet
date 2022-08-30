<?php

/**
 * Реализуйте функцию getIn, которая извлекает из массива (который может 
 * быть любой глубины вложенности) значение по указанным ключам. Аргументы:
 * 
 * Исходный массив 
 * Массив ключей, по которым ведется поиск значения
 * В случае, когда добраться до значения невозможно, возвращается null.
 */

function getIn(array $data, array $name)
{
    $result = $data;
    foreach ($name as $key) {
        if (!isset($result[$key])) {
            return null;
        }
        $result = $result[$key];
    }
    return $result;
}