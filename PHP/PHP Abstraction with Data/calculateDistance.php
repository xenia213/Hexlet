<?php

/**
 * peaлизуйтe фунkцию calculateDistance(), koтopaя нaхoдит paсстoяниe meжду двуmя тoчkamи 
 * нa плoсkoсти.
 */
function point($point)
{
    [$x, $y] = $point;
    return ['x' => $x,
            'y' => $y];
}
function getX($point)
{
    $x = point($point);
    return $x['x'];
}
function getY($point)
{
    $y = point($point);
    return $y['y'];
}
function calculateDistance($point1, $point2)
{
    return sqrt(((getX($point2) - getX($point1)) ** 2) +
        ((getY($point2) - getY($point1)) ** 2));
}

 $point1 = [0, 0];
 $point2 = [3, 4];
 calculateDistance($point1, $point2); // 5
 