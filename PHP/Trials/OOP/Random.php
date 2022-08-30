<?php

/**
 * Реализуйте генератор рандомных чисел, представленный классом Random. 
 * Интерфейс объекта включает в себя три функции:
 * 
 * Конструктор. Принимает на вход seed, начальное число генератора 
 * псевдослучайных чисел
 * getNext — метод, возвращающий новое случайное число
 * reset — метод, сбрасывающий генератор на начальное значение
 */

class Random
{
    private $number;
    private $init;

    public function __construct($number)
    {
        $this -> number = $number;
        $this -> init = $number;
    }

    public function reset()
    {
        $this -> number = $this -> init;
    }

    public function getNext()
    {
        $a = 5 + $this -> init;
        $c = 3 + $this -> init;
        $m = 11 + $this -> init;

        $this -> number = ($a * $this -> number + $c) % $m;

        return $this -> number;
    }
}