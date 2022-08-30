<?php

/**
 * Реализуйте функцию getSameParity, которая принимает на вход массив чисел 
 * и возвращает новый, состоящий из элементов, у которых такая же чётность, 
 * как и у первого элемента входного массива.
 */

function getSameParity($array)
{
    if (!empty($array)) {
        $new_array = [];
        $first = $array[0];
        if ($first % 2 === 0) {
            foreach ($array as $key) {
                if ($key % 2 === 0) {
                    $new_array[] = $key;
                }
            }
        } else {
            foreach ($array as $key) {
                if ($key % 2 !== 0) {
                    $new_array[] = $key;
                }
            }
        }
        return $new_array;
    } else {
        return $array;
    }
}