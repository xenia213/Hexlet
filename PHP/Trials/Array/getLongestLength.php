<?php

/**
 * Реализуйте функцию getLongestLength() принимающую на вход строку и 
 * возвращающую длину максимальной последовательности из неповторяющихся 
 * символов. Подстрока может состоять из одного символа. Например в строке 
 * qweqrty, можно выделить следующие подстроки: qwe, weqrty. Самой длинной 
 * будет weqrty.
 */

function getLongestLength($str)
{
    $len = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        for ($j = $i; $j < strlen($str); $j++) {
            $string = substr($str, $i, $j - $i + 1);
            if (strpos($string, $str[$j]) == $j - $i) {
                $len = ($len > strlen($string)) ? $len : strlen($string);
            } else {
                break;
            }
        }
    }
    return $len;
}