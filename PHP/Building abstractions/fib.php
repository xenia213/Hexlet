<?php

/**
 * Реализуйте функцию fib() находящую числа Фибоначчи используя 
 * рекурсивно-итеративный процесс, но вместо аккумулятора параметров 
 * для вложенной функции $iter() используйте переменные.
 */
//f(0) = 0
//f(1) = 1
//f(n) = f(n-1) + f(n-2)

function fib($num)
{
    $iter = function ($num) use (&$iter) {
        if ($num < 2) {
            return $num;
        } else {
            return $iter($num - 1) + $iter($num - 2);
        }
    };
    return $iter($num);
}

