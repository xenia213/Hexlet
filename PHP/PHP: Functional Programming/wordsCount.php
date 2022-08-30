<?php

/**
 * Реализуйте функцию wordsCount, которая принимает на вход массив слов 
 * и возвращает массив, в котором ключ это слово, а значение это количество 
 * раз, которое это слово встречалось в исходном массиве.
 */

function wordsCount($array)
{
    $result = array_reduce($array, function ($acc, $item) {
        if (!array_key_exists($item, $acc)) {
            $acc[$item] = 1;
        } else {
            $acc[$item]++;
        }
        return $acc;
    }, []);
    return $result;
}