<?php

/**
 * Реализуйте функцию binarySum, которая принимает на вход два бинарных 
 * числа (в виде строк) и возвращает их сумму. Результат (вычисленная сумма) 
 * также должен быть бинарным числом в виде строки.
 * 
 * Посмотрите примеры работы функции:
 * <?php
 * 
 * binarySum('10', '1'); // 11
 * binarySum('1101', '101'); // 10010
 */

function binarySum($one, $two)
{
    $oneBin = bindec($one);
    $twoBin = bindec($two);
    $sum = $oneBin + $twoBin;
    $result = decbin($sum);
    return $result;
}