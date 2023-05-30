<?php


/**
 *Реализуйте указанные ниже функции: 

 * makeSegment(). Приниmает на вход две точки и возвращает отрезок.
 * getMidpointOfSegment(). Приниmает на вход отрезок и возвращает точку находящуюся 
 * на середине отрезка.
 * getBeginPoint(). Приниmает на вход отрезок и возвращает точку начала отрезка.
 * getEndPoint(). Приниmает на вход отрезок и возвращает точку конца отрезка.
 */
function makeSegment($point1, $point2)
{
        return ['x' => $point1, 'y' => $point2];
}

function getMidpointOfSegment($segment)
{
    $point1 = (getX($segment));
    $point2 = (getY($segment));
    $x = (getX($point2) + getX($point1)) / 2;
    $y = (getY($point2) + getY($point1)) / 2;
    return makeSegment($x, $y);
}

function getBeginPoint($segment)
{
    return (getX($segment));
}

function getEndPoint($segment)
{
    return (getY($segment));
}
 $segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));

getMidpointOfSegment($segment); // (1.5, 1)
getBeginPoint($segment); // (3, 2)
getEndPoint($segment); // (0, 0)

