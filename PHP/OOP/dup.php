<?php

/**
 * Реализуйте функцию dup, которая клонирует переданную точку. 
 * Под клонированием подразумевается процесс создания нового объекта, с 
 * такими же данными как и у старого.
 */


namespace App\PointFunctions;

use App\Point;

// BEGIN (write your solution here)
function dup($point)
{
    $clonedPoint = new Point();
    $clonedPoint -> x = $point -> x;
    $clonedPoint -> y = $point -> y;

    return $clonedPoint;
}