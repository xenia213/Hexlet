<?php

/**
 * «Мощность строки» — выдуманное нами понятие, которое показывает ее силу ;-).
 *  Вычисляется оно как сумма ASCII кодов букв строки.
 * Реализуйте функцию getPowerOfString, которая находит мощность строки.
 */

function getPowerOfString($str)
{
    /*$strArray = str_split($str);
    $result = [];
    foreach ($strArray as $key) {
        $keyOrd = ord($key);
        $result[] = $keyOrd;
    }
    return array_sum($result);*/

    $result = map(str_split($str), function ($item) {
        return ord($item);
    });

    return array_sum($result);
}