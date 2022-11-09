<?php

/**
 * Идея сглаживания (smoothing a function) играет важную роль в обработке сигналов. 
 * Если f — функция, а dx — некоторое малое число, то сглаженная версия f есть функция, 
 * значение которой в точке x есть среднее между f(x − dx), f(x) и f(x + dx).
 * 
 * src/Solution.php
 * Напишите функцию smooth(), которая в качестве ввода принимает два аргумента: функцию, 
 * вычисляющую f, и малое число dx, а возвращает функцию, вычисляющую сглаженную версию f.
 */


function smooth($func, $dx)
{
    return function ($sum) use ($func, $dx) {
        $one = $func($sum - $dx);
        $two = $func($sum);
        $tree = $func($sum + $dx);
        return ($one + $two + $tree) / 3;
    };
}
