<?php

/**
 * src/Segment.php
 * Реализуйте класс App\Segment с двумя публичными свойствами 
 * beginPoint и endPoint. Определите в классе конструктор.
 * 
 * src/SegmentFunctions.php
 * Реализуйте функцию reverse, которая принимает на вход отрезок и 
 * возвращает новый отрезок с точками, добавленными в обратном порядке 
 * (begin меняется местами с end).
 * 
 * Примечания
 * Точки в результирующем отрезке должны быть копиями (по значению) 
 * соответствующих точек исходного отрезка. То есть они не должны быть 
 * ссылкой на один и тот же объект, так как это разные объекты (пускай 
 * и с одинаковыми координатами).
 */

//src/Segment.php
namespace App;

// BEGIN (write your solution here)
class Segment
{
    public $beginPoint;
    public $endPoint;

    public function __construct($beginPoint, $endPoint)
    {
        $this -> beginPoint = $beginPoint;
        $this -> endPoint = $endPoint;
    }
}


//src/SegmentFunctions.php
namespace App\SegmentFunctions;

use App\Point;
use App\Segment;

// BEGIN (write your solution here)
function reverse($segment)
{
    $xBegin = $segment -> endPoint -> x;
    $yBegin = $segment -> endPoint -> y;
    $xEnd = $segment -> beginPoint -> x;
    $yEnd = $segment -> beginPoint -> y;

    $result = new Segment(new Point($xBegin, $yBegin), new Point($xEnd, $yEnd));
    return $result;
}