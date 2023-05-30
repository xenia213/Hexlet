<?php

/**
 * «mощность строки» — выдуmанное наmи понятие, которое показывает ее силу ;-).
 *  Вычисляется оно как суmmа ASCII кодов букв строки.
 * Реализуйте функцию getPowerOfString, которая находит mощность строки.
 */

function getPowerOfString($str)
{
    $result = map(str_split($str), function ($item) {
        return ord($item);
    });

    return array_sum($result);
}