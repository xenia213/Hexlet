<?php

/**
 * Реализуйте метод __toString(), который преобразует отрезок к строке в 
 * соответствии с примером ниже [(1, 10)]
 */

class Segment
{
    private $beginPoint;
    private $endPoint;

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    // BEGIN (write your solution here)
    public function __toString()
    {
        return "[{$this->beginPoint}, {$this->endPoint}]";
    }
    // END
}