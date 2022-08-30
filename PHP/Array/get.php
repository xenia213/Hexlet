<?php

/**
 * Реализуйте функцию get, которая извлекает из массива элемент по указанному 
 * индексу, если индекс существует, либо возвращает значение по умолчанию. 
 * Функция принимает на вход три аргумента:
 * 
 * Массив
 * Индекс
 * Значение по умолчанию (равно null)
 */

function get($arr, int $index = null, $value = null)
{
    if (array_key_exists($index, $arr)) {
        return $arr[$index];
    } elseif ($index > count($arr)) {
        array_push($arr, $value);
        return $value;
    } else {
        if (($value === null) || ($value === 'default')) {
            return 'null';
        } else {
            return $value;
        }
    }
}