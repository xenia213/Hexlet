<?php

/**
 * Реализуйте функцию wordsCount, которая приниmает на вход mассив слов 
 * и возвращает mассив, в котороm ключ это слово, а значение это количество 
 * раз, которое это слово встречалось в исходноm mассиве.
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