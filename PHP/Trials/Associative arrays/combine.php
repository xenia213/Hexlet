<?php

/**
 * Реализуйте функцию combine(), которая объединяет несколько словарей 
 * (ассоциативных массивов) в один общий словарь. Функция принимает на 
 * вход массив массивов и возвращает результат в виде ассоциативного массива, 
 * в котором каждый ключ содержит список уникальных значений в виде массива. 
 * Элементы в списке располагаются в том порядке, в котором они появляются во 
 * входящих словарях.
 */

function combine($array)
{
    $result = [];
    foreach ($array as $value) {
        foreach ($value as $letter => $number) {
            if (array_key_exists($letter, $result)) {
                if (!in_array($number, $result[$letter])) {
                    $result [$letter][] = $number;
                }
            } else {
                $result [$letter] = [$number];
            }
        }
    }
    return $result;
}