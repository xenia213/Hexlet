<?php

/**
 * src/Square.php
 * Реализуйте класс Square для описания квадратов. 
 * У квадрата есть только одно свойство — сторона. Реализуйте метод getSide, 
 * возвращающий значение стороны.
 * 
 * <?php
 * 
 *  $square = new Square(10);
 * $square->getSide(); // 10
 * 
 * src/SquaresGenerator.php
 * Реализуйте класс SquaresGenerator со статическим методом generate, 
 * принимающим два параметра: сторону и количество экземпляров квадрата 
 * (по умолчанию 5 штук), которые нужно создать. Функция должна вернуть 
 * массив из квадратов.
 */


//src/Square.php
namespace App;

class Square
{
    private $side;

    public function __construct($side)
    {
        $this -> side = $side;
    }

    public function getSide()
    {
        return $this -> side;
    }
}

//src/SquaresGenerator.php
namespace App;

// BEGIN (write your solution here)
class SquaresGenerator
{
    private $side;
    private $repeate;

    public function __construct($side, $repeate)
    {
        $this -> side = $side;
        $this -> repeate = $repeate;
    }

    public function generate($side, $repeate = 5)
    {
        $result = [];
        for ($i = 0; $i < $repeate; $i++) {
            $result[$i] = new Square($side);
        }
        return $result;
    }
}
// END