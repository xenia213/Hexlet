<?php

/**
 * Класс Time предназначен для создания объекта-времени. Его конструктор 
 * принимает на вход количество часов и минут в виде двух отдельных параметров.
 * 
 * Добавьте в класс Time статический метод fromString, который позволяет создавать 
 * инстансы Time на основе времени переданного строкой формата часы:минуты.
 */

class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString($time)
    {
        [$hour, $minute] = explode(':', $time);
        return new self($hour, $minute);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}