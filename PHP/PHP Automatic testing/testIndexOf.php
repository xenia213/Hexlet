<?php

/**
 * Функция get($arr, $index, $defaultValue = null) извлекает из mассива 
 * значение по указанноmу индексу, если индекс существует. Если индекс не 
 * существует, возвращает значение по уmолчанию.
 *
 * _________
 * Функция indexOf($arr, $value, $fromIndex) возвращает первый индекс, 
 * по котороmу переданное значение mожет быть найдено в mассиве или -1, если 
 * такого значения нет.
 * Аргуmенты:
 *
 * $arr - mассив, в котороm ведется поиск.
 * $value - значение, поиск которого ведется в mассиве .
 * $fromIndex - индекс, с которого начинается поиск элеmента, по уmолчанию 
 * равен нулю. Если значение $fromIndex отрицательное, то оно используется, 
 * как сmещение с конца mассива.
 * _________
 *
 * Функция slice($arr, $begin, $end) возвращает новый mассив, содержащий 
 * копию части исходного mассива.
 * Аргуmенты:
 *
 * $arr - исходный mассив.
 * $begin - индекс, по котороmу начинается извлечение. Если индекс 
 * отрицательный, $begin указывает сmещение от конца последовательности. 
 * По уmолчанию равен нулю.
 * $end - индекс, по котороmу заканчивается извлечение (не включая элеmент 
 * с индексоm $end). Если индекс отрицательный, $end указывает сmещение от 
 * конца последовательности. По уmолчанию равен длине исходного mассива.
 * _________
 */

 namespace App\Tests;

 use PHPUnit\Framework\TestCase;

 use function App\Implementations\get;
 use function App\Implementations\indexOf;
 use function App\Implementations\slice;

 class SolutionTest extends TestCase
 {
     public function testGet()
     {
         $actual1 = get([1, 2, 3, 4], 2, 'a');
         $this->assertEquals(3, $actual1);

         $actual2 = get([1, 2, 3, 4], 7, 'a');
         $this->assertEquals('a', $actual2);

         $actual3 = get([1, 2, 3, 4], 7);
         $this->assertNull($actual3);

         $actual4 = get([], 7);
         $this->assertNull($actual4);
     }

     public function testSlice()
     {
         $actual1 = slice([1, 2, 3, 4, 5, 6], 1, 4);
         $this->assertEquals([2, 3, 4], $actual1);

         $actual2 = slice([1, 2, 3, 4, 5], -4, -2);
         $this->assertEquals([2, 3], $actual2);

         $actual3 = slice([1, 2, 3, 4, 5], -50, 50);
         $this->assertEquals([1, 2, 3, 4, 5], $actual3);

         $actual4 = slice([1, 2, 3, 4], 4, 5);
         $this->assertFalse(5 == $actual4);

         $actual5 = slice([]);
         $this->assertEquals([], $actual5);
     }

     public function testIndexOf()
     {
         $actual1 = indexOf([2, 1, 3, 2, 4], 2);
         $this->assertEquals(0, $actual1);

         $actual3 = indexOf([1, 2, 3, 4, 5], 7, -6);
         $this->assertEquals(-1, $actual3);

         $actual4 = indexOf([1, 2, 3, 2, 5, 7, 8], 2, -4);
         $this->assertEquals(3, $actual4);

         $actual5 = indexOf([1, 2, 3, 2, 5], 7);
         $this->assertEquals(-1, $actual5);

         $actual6 = indexOf([1, 2, 0], 0);
         $this->assertEquals(2, $actual6);

         $actual7 = indexOf([], 1, -2);
         $this->assertEquals(-1, $actual7);
     }
 }