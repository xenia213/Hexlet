<?php

/**
 * Реализуйте класс Circle для описания кругов. У круга есть только одно 
 * свойство - его радиус. Реализуйте методы getArea и getCircumference, 
 * которые возвращают площадь и периметр круга соответственно.
 */


class Circle
{
    private $radius;
    //const PI = 3.1415926535;

    public function __construct($radius)
    {
        $this -> radius = $radius;
    }

    public function getArea()
    {
        return ($this -> radius ** 2) * pi();
    }

    public function getCircumference()
    {
        return 2 * pi() * $this -> radius;
    }
}