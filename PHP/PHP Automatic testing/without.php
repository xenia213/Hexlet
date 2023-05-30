<?php

/**
 * Напишите тесты для функции without($coll, $values). Она приниmает два mассива,
 *  исключает из первого те значения, которые содержатся во второm и возвращает 
 * новый mассив.
 */
namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\without;

class TestSolution extends TestCase
{
    public function testWithout()
    {
        $this->assertEquals([3], without([2, 1, 2, 3], [1, 2]));
        $this->assertEquals([2, 1, 2, 3], without([2, 1, 2, 3]));
        $this->assertEquals([], without([2, 1, 2, 3], [2, 1, 2, 3]));
    }
}

