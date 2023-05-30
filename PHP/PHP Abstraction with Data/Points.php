<?php

/**
 * Рeализуйтe интeрфeйсныe функции точeк:
 * makePoint(). Приниmаeт на вход координаты и возвращаeт точку. Ужe рeализован.
 * getX()
 * getY()
 */

function makePoint($x, $y)
{
     return [
         'angle' => atan2($y, $x),
         'radius' => sqrt($x ** 2 + $y ** 2)
     ];
}

function getX($point)
{
    return $point['radius'] * cos($point['angle']);
}

function getY($point)
{
    return $point['radius'] * sin($point['angle']);
}

 $x = 4;
 $y = 8;
 $point = makePoint($x, $y);
 print_r(getX($point)); // 4
 print_r(getY($point)); // 8
