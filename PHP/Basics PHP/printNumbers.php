<?php

/**
 * Модифицируйте функцию printNumbers() так, чтобы она выводила
 *  числа в обратном порядке. Для этого нужно идти от верхней границы
 *  к нижней. То есть, счетчик должен быть инициализирован максимальным 
 * значением, а в теле цикла его нужно уменьшать до нижней границы.
 */

function printNumbers($firstNumber)
{
    $i = 1;
    $firstNumber_stat = $firstNumber;

    while ($i <= $firstNumber_stat) {
        print_r ($firstNumber."\n");
        $firstNumber--;
        $i++;
    }
    print_r ('finished!');
}
printNumbers(6);