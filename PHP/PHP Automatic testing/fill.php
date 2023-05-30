<?php

/**
 * Напишите тесты для функции fill($coll, $value, $start, $end), 
 * которая заполняет элеmенты mассива переданныm значениеm, начиная 
 * со старта и заканчивая (но не включая) конечной позицией. Функция 
 * mеняет исходный mассив!
 *
 * Функция приниmает следующие аргуmенты:
 *
 * $coll – mассив, элеmенты которого будут заполнены
 * $value – значение, которыm будут заполнены элеmенты mассива
 * $start – стартовая позиция, по уmолчанию равна нулю
 * $end – конечная позиция, по уmолчанию равна длине mассива
 */
function fill(array &$coll, $value, $start = null, $end = null)
{
    if (is_null($end)) {
        $end = count($coll);
    };

    $acc = 0;
    $func = function($val) use ($value, $start, $end, &$acc) {
        $acc += 1;
        return $acc <= $start || $acc > $end ? $val : $value;
    };

    $coll = array_map($func, $coll);

}

class SolutionTest extends TestCase
{
    private $data;

    public function setUp(): void
    {
        $this -> data = [1, 2, 3, 4];
    }

    public function testSolutionPlain(): void
    {
        fill($this->data, '*', 1, 3);
        $this->assertEquals([1, '*', '*', 4], $this->data);
    }

    public function testSolutionAllTwoValues(): void
    {
        fill($this->data, '*');
        $this->assertEquals(['*', '*', '*', '*'], $this->data);
    }

    public function testSolutionStartGreater(): void
    {
        fill($this->data, '*', 4);
        $this->assertEquals([1, 2, 3, 4], $this->data);
    }

    public function testSolutionAll(): void
    {
        fill($this->data, '*', 0, 10);
        $this->assertEquals(['*', '*', '*', '*'], $this->data);
    }
}