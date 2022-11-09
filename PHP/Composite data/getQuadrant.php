<?php

/**
 * Реализуйте следующие функции для работы с точками:
 * 
 * getQuadrant() — функция, которая вычисляет квадрант, в котором находится точка. 
 * Ниже приведена схема, показывающая номера квадрантов на плоскости.
 * 
 *            +
 *          2 | 1
 *            |
 *    +----------------+
 *            |
 *          3 | 4
 *            +
 * 
 *  $point = makePoint(1, 5);
 * getQuadrant($point); // 1
 * getQuadrant(makePoint(3, -3)); // 4
 * 
 * Если точка не принадлежит ни одному квадранту (т.е., если она лежит хотя бы на 
 * одной из осей координат), то функция должна возвращать null:
 * 
 *  $point = makePoint(0, 7);
 * getQuadrant($point); // null
 * getQuadrant(makePoint(2, 0)); // null
 * 
 * getSymmetricalPoint() — функция, возвращающая новую точку, симметричную относительно 
 * начала координат. Такая симметричность означает, что меняются знаки у x и y.
 * 
 *  getSymmetricalPoint(makePoint(1, 5)); // makePoint(-1, -5)
 * 
 * calculateDistance() — функция, вычисляющая расстояние между точками по 
 * формуле: d = sqrt((x2−x1)^2+(y2−y1)^2)
 * 
 *  calculateDistance(makePoint(-2, -3), makePoint(-4, 4)); // ≈ 7.28
 */
use function Php\Points\Points\makePoint;
use function Php\Points\Points\getX;
use function Php\Points\Points\getY;
use function Php\Points\Points\toString;

function getQuadrant($point)
{
    $x = getX($point);
    $y = getY($point);
    if (($x == 0) || ($y == 0)) {
        return 'null';
    } elseif (($x > 0) && ($y > 0)) {
        return '1';
    } elseif (($x > 0) && ($y < 0)) {
        return '4';
    } elseif (($x < 0) && ($y > 0)) {
        return '2';
    } elseif (($x < 0) && ($y < 0)) {
        return '3';
    }
}

function getSymmetricalPoint($point)
{
    return makePoint(-getX($point), -getY($point));
}

function calculateDistance($point, $point2)
{
    $x = getX($point);
    $y = getY($point);
    $x2 = getX($point2);
    $y2 = getY($point2);
    return sqrt((($x2 - $x)**2)+(($y2 - $y)**2));
}
