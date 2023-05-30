<?php

/**
 * Реализуйте функцию mapWithPower, которая принимает на вход массив и 
 * степень, и возвращает новый массив, в котором каждое значение возведено 
 * в переданную степень.
 */

namespace App\Solution;
use function Functional\map;
use function Functional\partial_any;
use const Functional\…;

// BEGIN (write your solution here)
function mapWithPower($array, $degree)
{
    $pow = partial_any('pow', …, $degree);
    return map($array, $pow);
}
// END