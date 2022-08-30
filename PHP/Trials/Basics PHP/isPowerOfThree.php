<?php

/**
 * Реализуйте функцию isPowerOfThree() которая определяет, является ли переданное
 *  число натуральной степенью тройки. Например, число 27 – это третья степень 
 * (3 в 3 степени), а 81 – четвёртая (3 в 4 степени).
 */

function isPowerOfThree($number)
{
    $i = 1;
    while ($i <= $number) {
        if ($i == $number) {
            return true;
        }
        $i *= 3;
    } return false;
}